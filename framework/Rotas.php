<?php 

namespace senac\framework;

use senac\framework\Config;

class Rotas {
    private $url;
    private $nomeDaActionAtual;
    private $nomeDaControllerAtual;

    public function __construct() {
        $this->url = explode("/", $_REQUEST["url"]);
    }

    public function mapearRotas($controllerPadrao, $actionPadrao) {
        if (count($this->url) > 0) {
            if (empty($this->url[0])) {
                $nomeDaController = $controllerPadrao;
            } else {
                $nomeDaController = $this->url[0];
            }

            if (empty($this->url[1])) {
                $this->nomeDaActionAtual = $actionPadrao;
            } else {
                $this->nomeDaActionAtual = $this->url[1];
            }
        } else {
            $nomeDaController = $nomeDaController.$controllerPadrao;
            $this->nomeDaActionAtual = $actionPadrao;
        }

        $this->nomeDaControllerAtual = Config::$namespaceDasControllers . $nomeDaController . "Controller"; 

        $params = array();

        for($i = 2; $i < count($this->url); $i++) {
            array_push($params, $this->url[$i]);
        }

        require_once Config::$caminhoDasControllers  . $nomeDaController . "Controller.php";

        if (class_exists($this->nomeDaControllerAtual)) {
            
            $controller = new $this->nomeDaControllerAtual();

            if (method_exists($controller, $this->nomeDaActionAtual)) {
                $r = new \ReflectionMethod($this->nomeDaControllerAtual, $this->nomeDaActionAtual);
                $parametrosDaAction = $r->getParameters();

                $r->invokeArgs($controller, $params);
            } else {
                header($_SERVER["SERVER_PROTOCOL"] . " 500 - Action not found", true, 500);
            }
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . " 500 - Controller not found", true, 500);
        }
    }
}

?>
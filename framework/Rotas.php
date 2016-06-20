<?php 

namespace senac\framework;

use senac\framework\Config;
use senac\framework\utils\DadosUtil;

class Rotas {
    private $url;
    private $nomeDaActionAtual;
    private $nomeDaControllerAtual;

    public function __construct() {
        $this->metodoHttp = $_SERVER["REQUEST_METHOD"];
        $this->url = explode("/", $_REQUEST["url"]);
    }

    public function interceptarRotas($controllerPadrao, $actionPadrao) {
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

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty("POST")) {
                $params[] = DadosUtil::mapearClasseArray($_POST);
            }
        }
        else {
            for($i = 2; $i < count($this->url); $i++) {
                array_push($params, $this->url[$i]);
            }
        }

        require_once Config::$caminhoDasControllers  . $nomeDaController . "Controller.php";

        if (class_exists($this->nomeDaControllerAtual)) {
            
            $controller = new $this->nomeDaControllerAtual();

            if (method_exists($controller, $this->nomeDaActionAtual)) {
                $r = new \ReflectionMethod($this->nomeDaControllerAtual, $this->nomeDaActionAtual);
                $parametrosDaAction = $r->getParameters();

                session_save_path(Config::$caminhoDaSessao);
                session_start();

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
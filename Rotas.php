<?php 

namespace senac\lavajato;

include "/controllers/HomeController.php";

class Rotas {
    private $url;

    public function __construct() {
        $this->url = split("/", parse_url($_SERVER["REQUEST_URI"])["path"]);
    }

    public function mapearRotas($controllerPadrao, $actionPadrao) {
        if (count($this->url) > 1) {
            $nomeDaController = CONTROLLERS_NAMESPACE;
            $nomeDaAction = "";

            if (empty($this->url[2])) {
                $nomeDaController = $nomeDaController . $controllerPadrao;
            } else {
                $nomeDaController = $nomeDaController . $this->url[2];
            }

            $nomeDaController = $nomeDaController ."Controller";

            if (empty($this->url[3])) {
                $nomeDaAction = $actionPadrao;
            } else {
                $nomeDaAction = $this->url[3];
            }
        }

        $params = array();

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $query = $_GET;
            foreach($query as $key => $value) {
                if ($key != "url") $params[] = $value;
            }
        } else {
            $params = $_POST;
        }

        if (class_exists($nomeDaController)) {
            $controller = new $nomeDaController();

            if (method_exists($controller, $nomeDaAction)) {
                $r = new \ReflectionMethod($nomeDaController, $nomeDaAction);
                $parametrosDaAction = $r->getParameters();

                $r->invokeArgs($controller, $params);
            } else {
                echo "<h1>404 Not found </h1><p>Nenhuma action encontrada</p>";
            }
        } else {
            echo "<h1> 404 Not Found </h1> <p> Nenhuma controller encontrada </p>";
        }
    }
}

?>
<?php

namespace senac\lavajato;

require_once "AppConfig.php";
require_once "controllers\Controller.php";
require_once "actionResults\IActionResult.php";
require_once "actionResults\View.php";

require_once "Rotas.php";

class Startup {

    public function __construct($rotas) {
        $rotas->mapearRotas("Home", "Index");
    }
}

$startup = new Startup(new Rotas());

?>
<?php

namespace senac\lavajato;

require_once "AppConfig.php";
require_once "controllers\Controller.php";
require_once "actionResults\IActionResult.php";
require_once "actionResults\View.php";

require_once "Rotas.php";

require_once "utils\web\WebUtils.php";

require_once "viewModels\UsuarioViewModel.php";

class Startup {
    public function __construct($rotas) {
        AppConfig::definirValoresIniciais();

        $rotas->mapearRotas("Principal", "Index");
    }
}

$startup = new Startup(new Rotas());

?>
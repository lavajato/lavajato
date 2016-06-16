<?php

namespace senac\lavajato;

require_once "AppConfig.php";
require_once "app\controllers\Controller.php";
require_once "app\actionResults\IActionResult.php";
require_once "app\actionResults\View.php";
require_once "app\actionResults\Redirecionar.php";

require_once "Rotas.php";

require_once "utils\web\WebUtils.php";

require_once "app\\viewModels\UsuarioViewModel.php";
require_once "app\\viewModels\ListaDeUsuariosViewModel.php";

require_once "dominio\\repositorios\IRepositorio.php";
require_once "dominio\\repositorios\IUnidadeDeTrabalho.php";

require_once "dominio\\entidades\\Usuario.php";

require_once "infra\\repositoriosMysql\Contexto.php";
require_once "infra\\repositoriosMySql\UnidadeDeTrabalho.php";
require_once "infra\\repositoriosMySql\RepositorioDeUsuarios.php";

class Startup {
    public function __construct($rotas) {
        
        $rotas->mapearRotas("Principal", "Index");
    }
}

$startup = new Startup(new Rotas());

?>
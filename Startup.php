<?php

namespace senac\lavajato;

require_once "AppConfig.php";
require_once "app\controllers\Controller.php";
require_once "app\actionResults\IActionResult.php";
require_once "app\actionResults\View.php";
require_once "app\actionResults\Redirecionar.php";

require_once "Rotas.php";

require_once "utils\web\WebUtils.php";
require_once "utils\dados\DadosUtil.php";

require_once "app\\viewModels\ClienteViewModel.php";
require_once "app\\viewModels\ClienteDaListaViewModel.php";
require_once "app\\viewModels\ListaDeClientesViewModel.php";

require_once "dominio\\repositorios\IRepositorio.php";
require_once "dominio\\repositorios\IUnidadeDeTrabalho.php";

require_once "dominio\\entidades\\Usuario.php";
require_once "dominio\\entidades\\Cliente.php";

require_once "infra\\repositoriosMysql\Contexto.php";
require_once "infra\\repositoriosMySql\UnidadeDeTrabalho.php";
require_once "infra\\repositoriosMySql\RepositorioDeClientes.php";

class Startup {
    public function __construct($rotas) {
        
        $rotas->mapearRotas("Principal", "Index");
    }
}

$startup = new Startup(new Rotas());

?>
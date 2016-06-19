<?php

namespace senac\lavajato;

require_once "framework\\Bootstrap.php";

require_once "AppConfig.php";

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


use senac\framework\Rotas;  

class Startup {
    public function __construct($rotas) {
        AppConfig::iniciarValores();
        $rotas->mapearRotas("Principal", "Index");
    }
}

$startup = new Startup(new  Rotas());

?>
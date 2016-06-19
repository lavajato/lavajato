<?php
 
namespace senac\lavajato\controllers;

use senac\framework\controllers\Controller;

use senac\lavajato\utils\dados\DadosUtil;

use senac\lavajato\viewModels\ClienteViewModel;
use senac\lavajato\viewModels\ListaDeClientesViewModel;

use senac\lavajato\infra\repositoriosMySql\Contexto;
use senac\lavajato\infra\repositoriosMySql\UnidadeDeTrabalho;

class ClientesController extends Controller {
    private $unidadeDeTrabalho;
    private $repositorioDeClientes;
    
    public function __construct() {
        $this->unidadeDeTrabalho = new UnidadeDeTrabalho(new Contexto());
        $this->repositorioDeClientes = $this->unidadeDeTrabalho->pegarRepositorio("RepositorioDeClientes");
    }

    public function index() {
        $clientes = new ListaDeClientesViewModel($this->repositorioDeClientes->listar());
        
        return parent::view($clientes);
    }

    public function editar($id = null) {
        if($id == null)
            return parent::redirecionar("/Clientes");
            
        $cliente = DadosUtil::mapearClasse($this->repositorioDeClientes->pegarPorId($id), new ClienteViewModel());
        
        return parent::view($cliente);
    }

    public function cadastrar() {
        return parent::view();
    }

    public function postarCadastro($cliente) {

        $this->repositorioDeClientes->inserir($cliente);

        return parent::redirecionar("/Index");
    }
}

?>
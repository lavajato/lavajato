<?php 

namespace senac\lavajato\controllers;

use senac\framework\utils\DadosUtil;
use senac\framework\controllers\Controller;

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
        if ($id == null) return parent::redirecionar("/Clientes");

        $cliente = DadosUtil::mapearClasse($this->repositorioDeClientes->pegarPorId($id), new ClienteViewModel());

        return parent::view($cliente);
    }

    public function editarDados($cliente) {
        try {
            $this->repositorioDeClientes->atualizar($cliente);
            return parent::redirecionar("/lavajato/Clientes", "Dados atualizados com sucesso.", "sucesso");
        } catch (\Exception $e) {
            return parent::redirecionar("/lavajato/Clientes", "Erro ao realizar o cadastro.", "erro");
        }
    }

    public function cadastro() {
        return parent::view();
    }

    public function cadastrar($cliente) {
        try {
            $this->repositorioDeClientes->inserir($cliente);
            return parent::redirecionar("/lavajato/Clientes", "Cadastro realizado com sucesso.", "sucesso");
        } catch (\Exception $e) {
            return parent::redirecionar("/lavajato/Clientes", "Erro ao realizar o cadastro.", "erro");
        }
    }
}

?>
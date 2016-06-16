<?php
 
namespace senac\lavajato\controllers;

use senac\lavajato\viewModels\UsuarioViewModel;
use senac\lavajato\viewModels\ListaDeUsuariosViewModel;

use senac\lavajato\infra\repositoriosMySql\Contexto;
use senac\lavajato\infra\repositoriosMySql\UnidadeDeTrabalho;

class UsuariosController extends Controller {
    private $unidadeDeTrabalho;
    private $repositorioDeUsuarios;
    
    public function __construct() {
        $this->unidadeDeTrabalho = new UnidadeDeTrabalho(new Contexto());
        $this->repositorioDeUsuarios = $this->unidadeDeTrabalho->pegarRepositorio("RepositorioDeUsuarios");
    }

    public function index() {
        $usuarios = new ListaDeUsuariosViewModel($this->repositorioDeUsuarios->listar());
        
        return parent::view($usuarios);
    }

    public function editar($id = null) {

        if($id == null)
            return parent::redirecionar("/Usuarios");

        $usuario = new UsuarioViewModel($this->repositorioDeUsuarios->pegarPorId($id));
        
        return parent::view($usuario);
    }
}

?>
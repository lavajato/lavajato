<?php
 
namespace senac\lavajato\controllers;

class UsuariosController extends Controller {
    public function __construct() {

    }

    public function index() {
        return parent::view();
    }

    public function editar($id = null) {

        if($id == null)
            return parent::redirecionar("/Usuarios");

        return parent::view();
    }
}

?>
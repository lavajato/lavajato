<?php

namespace senac\lavajato\viewModels;

class ListaDeUsuariosViewModel {

    private $usuarios;

    public function __construct($usuarios) {
        $this->usuarios = array();

        if($usuarios == null || empty($usuarios))
            return;

        foreach ($usuarios as $usuario) {
            array_push($this->usuarios, new UsuarioViewModel($usuario));
        }
    }

    public function usuarios() {
        return $this->usuarios;
    }

}

?>
<?php

namespace senac\lavajato\viewModels;

class UsuarioViewModel {

    private $id;
    private $nome;
    private $email;

    public function __construct($usuario = null) {
        if(!isset($usuario) || $usuario == null)
            return;
        
        $this->id = $usuario->pegarId();
        $this->nome = $usuario->pegarNome();
        $this->email = $usuario->pegarEmail();
    }

    public function pegarNome() {
        return $this->nome;
    }

}

?>
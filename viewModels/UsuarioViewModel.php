<?php


namespace senac\lavajato\viewModels;

class UsuarioViewModel {

    public $id;
    public $nome;
    public  $email;

    public function __construct($nome = null, $email = null) {
        $this->nome = $nome;
        $this->email = $email;
    }

}

?>
<?php


namespace senac\lavajato\viewModels;

class UsuarioViewModel {

    private $id;
    private $nome;
    private $email;

    public function __construct($id = null, $nome = null, $email = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

}

?>
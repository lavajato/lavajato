<?php

namespace senac\lavajato\dominio\entidades;

class Usuario {
    private $id;
    private $nome;
    private $email;

    public function __construct($id, $nome, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function pegarId() {
        return $this->id;
    }

    public function pegarNome() {
        return $this->nome;
    }

    public function pegarEmail() {
        return $this->email;
    }
}

?>


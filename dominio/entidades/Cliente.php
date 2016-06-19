<?php

namespace senac\lavajato\dominio\entidades;

class Cliente  {
    private $id;
    private $nome;
    private $email;
    private $rg;
    private $telefone;
    private $receberSms;
    private $dataDoCadastro;
    private $ativo;
    private $ultimoLogin;


    public function __construct($id = null, $nome = null, $email = null, $rg = null, $telefone = null, $receberSms = null) {
        // $this->id = $id;
        // $this->nome = $Nome;
        // $this->Email = $Email;
        // $this->Rg = $rg;
        // $this->Telefone = $telefone;
        // $this->ReceberSms = $receberSms;
        //$dataDoCadastro = getdate();
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

    public function pegarRg() {

    }
}

?>


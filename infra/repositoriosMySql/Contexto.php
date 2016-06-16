<?php

namespace senac\lavajato\infra\repositoriosMySql;

use senac\lavajato\dominio\entidades\Usuario;

class Contexto {

    //private $con;
    private $usuarios;

    public function __construct() {
        //$this->con = new \PDO("mysql:host=localhost;dbname=lavajato", "root", "root");
        $this->usuarios = Array(
            new Usuario(1, "Lucílvio Lima", "lucilvio@gmail.com"),
            new Usuario(2, "João Merli", "joaoa-merly@gmail.com"),
            new Usuario(3, "Leila Arantes", "larantes@gmail.com"),
            new Usuario(4, "Rodrigo Beça", "beçça@gmail.com")
        );
    }

    public function usuarios() {
        return $this->usuarios;
    }

    public function __destruct() {
        //$this->con = null;
    }
}

?>
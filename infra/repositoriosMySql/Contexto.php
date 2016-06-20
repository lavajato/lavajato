<?php

namespace senac\lavajato\infra\repositoriosMySql;

use senac\lavajato\AppConfig;
use senac\lavajato\dominio\entidades\Cliente;

class Contexto {

    private $con;
    private $clientes;

    public function __construct() {
        try {
            $this->con = new \PDO(AppConfig::$stringDeConexao, AppConfig::$usuarioDoBanco, AppConfig::$senhaDoBanco);
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function conexao() {
        return $this->con;
    }

    public function __destruct() {
        $this->con = null;
    }
}

?>
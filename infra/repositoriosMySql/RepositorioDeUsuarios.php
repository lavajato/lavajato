<?php

namespace senac\lavajato\infra\repositoriosMySql;

use senac\lavajato\dominio\entidades\Usuario;
use senac\lavajato\dominio\repositorios\IRepositorio;

class RepositorioDeUsuarios implements IRepositorio {

    private $contexto;

    public function __construct($contexto) {
        $this->contexto = $contexto;
    }

    public function listar() {
        return $this->contexto->usuarios();
    }

    public function pegarPorId($id) {
        foreach ($this->contexto->usuarios() as $usuario) {
            if($usuario->pegarId() == $id)
                return $usuario;
        }
    }

    public function inserir($entidade) {

    }

    public function atualizar($entidade) {

    }
}

?>
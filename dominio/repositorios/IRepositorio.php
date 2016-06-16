<?php

namespace senac\lavajato\dominio\repositorios;

interface IRepositorio {
    public function listar();
    public function pegarPorId($id);
    public function inserir($entidade);
    public function atualizar($entidade);
}

?>
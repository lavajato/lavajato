<?php 

namespace senac\lavajato\infra\repositoriosMySql;

use senac\lavajato\dominio\entidades\Cliente;
use senac\lavajato\dominio\repositorios\IRepositorio;

class RepositorioDeClientes implements IRepositorio {

    private $contexto;

    public function __construct($contexto) {
        $this->contexto = $contexto;
    }

    public function listar() {
        $sql = "select c.IdCliente as id, c.Nome as nome, c.Email as email, c.Rg as rg, c.Telefone as telefone, ";
        $sql = $sql."ReceberSms as receberSms, c.DataDoCadastro as dataDoCadastro, u.Ativo as ativo,  ";
        $sql = $sql."u.UltimoLogin as ultimoLogin from cliente as c inner join Usuario as u on c.IdUsuario = u.IdUsuario";

        $query = $this->contexto->conexao()->query($sql);

        $clientes = Array();

        while ($cliente = $query->fetchObject(get_class(new Cliente()))) {
            $clientes[] = $cliente;
        }

        return $clientes;
    }

    public function pegarPorId($id) {
        $sql = "select c.IdCliente as id, c.Nome as nome, c.Email as email, c.Rg as rg, c.Telefone as telefone, ";
        $sql = $sql."ReceberSms as receberSms, c.DataDoCadastro as dataDoCadastro, u.Ativo as ativo,  ";
        $sql = $sql."u.UltimoLogin as ultimoLogin from cliente as c inner join Usuario as u on c.IdUsuario = u.IdUsuario ";
        $sql = $sql . "where c.IdCliente = $id";

        $query = $this->contexto->conexao()->query($sql);

        $cliente = $query->fetchObject(get_class(new Cliente()));

        return $cliente;
    }

    public function inserir($entidade) {
        $sql = "insert into Cliente(IdCliente, Nome, Email, Rg, Telefone, ReceberSms, DataDoCadastro,)";
    }

    public function atualizar($entidade) {

    }
}

?>
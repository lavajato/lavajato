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
        $sql = $sql."ReceberSms as receberSms, c.DataDoCadastro as dataDoCadastro, u.Ativo as ativo, u.IdUsuario as idUsuario, ";
        $sql = $sql."u.UltimoLogin as ultimoLogin from cliente as c inner join Usuario as u on c.IdUsuario = u.IdUsuario ";
        $sql = $sql."where c.IdCliente = $id";

        $query = $this->contexto->conexao()->query($sql);

        $cliente = $query->fetchObject(get_class(new Cliente()));

        return $cliente;
    }

    public function inserir($entidade) {
        $con = $this->contexto->conexao();

        try {
            $con->beginTransaction();

            $sql = "insert into Usuario(Senha, UltimoLogin, IdTipoUsuario, Ativo)";
            $sql = $sql." values(:senha, null, 1, 1)";

            $query = $con->prepare($sql);
            $query->bindValue(":senha", $entidade->senha);
            $query->execute();

            $usuarioCadastrado = $con->lastInsertId();

            $sql = "insert into Cliente(IdUsuario, Nome, Email, Rg, Telefone, ReceberSms, DataDoCadastro)";
            $sql = $sql." values(:idUsuario, :nome, :email, :rg, :telefone, :receberSms, '2016-12-12')";
            $query = $con->prepare($sql);

            $query->bindValue(":idUsuario", $usuarioCadastrado);
            $query->bindValue(":nome", $entidade->nome);
            $query->bindValue(":email", $entidade->email);
            $query->bindValue(":rg", $entidade->rg);
            $query->bindValue(":telefone", $entidade->telefone);
            $query->bindValue(":receberSms", $entidade->receberSms == "on" ? 1 : 0, \PDO::PARAM_BOOL);

            $query->execute();

            $con->commit();
        } catch (\Exception $e) {
            $con->rollBack();

            throw $e;
        }
    }

    public function atualizar($entidade) {
        $con = $this->contexto->conexao();

        try {
            $con->beginTransaction();

            $query = $con->prepare("update Usuario set Ativo = :ativo where idUsuario = :idUsuario;");
            $query->bindValue(":ativo", isset($entidade->ativo) && $entidade->ativo == "on" ? 1 : 0, \PDO::PARAM_BOOL);
            $query->bindValue(":idUsuario", $entidade->idUsuario);
            $query->execute();

            $sql = "update Cliente set nome = :nome, email = :email, rg = :rg, telefone = :telefone, receberSms = :receberSms";
            $sql = $sql." where IdCliente = :id";
            $query = $con->prepare($sql);

            $query->bindValue(":nome", $entidade->nome);
            $query->bindValue(":email", $entidade->email);
            $query->bindValue(":rg", $entidade->rg);
            $query->bindValue(":telefone", $entidade->telefone);
            $query->bindValue(":receberSms", isset($entidade->receberSms) && $entidade->receberSms == "on" ? 1 : 0, \PDO::PARAM_BOOL);
            $query->bindValue(":id", $entidade->id);

            $query->execute();

            $con->commit();
        } catch (\Exception $e) {
            $con->rollBack();

            throw $e;
        }
    }
}

?>
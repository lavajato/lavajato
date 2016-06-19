<?php

namespace senac\lavajato\infra\repositoriosMySql;

use senac\lavajato\dominio\repositorios\IUnidadeDeTrabalho;

class UnidadeDeTrabalho implements IUnidadeDeTrabalho {

    private $contexto;
    private $repositorios;

    function __construct($contexto) {
        $this->contexto = $contexto;
    }

    public function pegarRepositorio($nomeDoRepositorio) {
        if($nomeDoRepositorio == "RepositorioDeClientes")
            return new RepositorioDeClientes($this->contexto);
    }
}

?>
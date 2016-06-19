<?php

namespace senac\lavajato\viewModels;

use senac\lavajato\utils\dados\DadosUtil;

class ListaDeClientesViewModel {

    private $clientes;

    public function __construct($clientes) {
        $this->clientes = array();

        if($clientes == null || empty($clientes))
            return;

        foreach ($clientes as $cliente) {
            array_push($this->clientes,  DadosUtil::mapearClasse($cliente, new ClienteDaListaViewModel()));
        }
    }

    public function clientes() {
        return $this->clientes;
    }

}

?>
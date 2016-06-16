<?php

namespace senac\lavajato\controllers;

use \senac\lavajato\actionResults\View;
use \senac\lavajato\actionResults\Redirecionar;

abstract class Controller {

    protected function view($viewModel = null, $caminhoDaView = null) {
        $caminho = "";

        if(!isset($caminhoDaView) || empty($caminhoDaView)) {
            $ref = new \ReflectionClass($this);
            $pasta = str_replace("Controller", "", $ref->getShortName());
            $view = debug_backtrace()[1]['function'] . ".php";

            $caminho = $pasta . "\\" . $view;
        }
        else {
            $caminho = $caminhoDaView;
        }

        return new View($viewModel, $caminho);
    }

    protected function redirecionar($rota) {
        return new Redirecionar($rota);
    }
}

?>
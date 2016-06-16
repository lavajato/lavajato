<?php

namespace senac\lavajato\controllers;

use \senac\lavajato\actionResults\View;
use \senac\lavajato\actionResults\Redirecionar;

abstract class Controller {

    protected function view($caminhoDaView = null, $viewModel = null) {
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

        return new View($caminho, $viewModel);
    }

    protected function redirecionar($rota) {
        return new Redirecionar($rota);
    }
}

?>
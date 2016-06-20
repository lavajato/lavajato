<?php

namespace senac\framework\controllers;

use \senac\framework\actionResults\View;
use \senac\framework\actionResults\Redirecionar;

abstract class Controller {

    protected function view($viewModel = null, $caminhoDaView = null) {
        $caminho = "";

        if(!isset($caminhoDaView) || empty($caminhoDaView)) {
            $ref = new \ReflectionClass($this);
            $pasta = str_replace("Controller", "", $ref->getShortName());
            $view = debug_backtrace()[1]['function'] . ".html";

            $caminho = $pasta . "\\" . $view;
        }
        else {
            $caminho = $caminhoDaView;
        }

        return new View($viewModel, $caminho);
    }

    protected function redirecionar($rota, $mensagem = null, $tipoDeRetorno = null) {
        return new Redirecionar($rota, $mensagem, $tipoDeRetorno);
    }
}

?>
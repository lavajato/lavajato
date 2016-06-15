<?php

namespace senac\lavajato;

class AppConfig {

    public static $caminhoDasViews;
    public static $caminhoDasControllers;
    public static $namespaceDasControllers;
    public static $caminhoRelativo;
    public static $versao;

    private static $assets;

    public static function definirValoresIniciais() {
        self::$caminhoDasViews = getcwd() . "\\views\\";
        self::$caminhoDasControllers = getcwd() . "\\controllers\\";
        self::$namespaceDasControllers = "senac\\lavajato\\controllers\\";
        self::$caminhoRelativo = "\lavajato";
        self::$versao = "1.0";

        self::$assets = self::$caminhoRelativo . "\\assets\\";
    }
 
    public static function pegarAsset($caminho) {
        echo(self::$assets . $caminho); 
    }

    public static function rota($rota) {
        echo(self::$caminhoRelativo . $rota);
    }
}

?>
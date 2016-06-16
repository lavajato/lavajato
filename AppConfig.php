<?php

namespace senac\lavajato;

class AppConfig {

    public static $caminhoDasViews;
    public static $caminhoDasControllers;
    public static $namespaceDasControllers;
    public static $caminhoRelativo;
    public static $versao;
    public static $assets;

    public static function definirValoresIniciais() {
        self::$caminhoDasViews = getcwd() . "\app\\views\\";
        self::$caminhoDasControllers = getcwd() . "\app\\controllers\\";
        self::$namespaceDasControllers = "senac\\lavajato\\controllers\\";
        self::$caminhoRelativo = "\lavajato";
        self::$versao = "1.0";

        self::$assets = self::$caminhoRelativo . "\app\\assets\\";
    }
}

AppConfig::definirValoresIniciais();

?>
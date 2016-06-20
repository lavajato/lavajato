<?php

namespace senac\lavajato;

use senac\framework\Config;

class AppConfig extends Config {
    public static $versao;

    public static $stringDeConexao;
    public static $usuarioDoBanco;
    public static $senhaDoBanco;

    public static function iniciarValores() {
        self::$caminhoDasViews = getcwd() . "\app\\views\\";
        self::$caminhoDasControllers = getcwd() . "\app\\controllers\\";
        self::$namespaceDasControllers = "senac\\lavajato\\controllers\\";
        self::$caminhoDaSessao = getcwd() . "\\session";

        self::$versao = "1.0";

        self::$stringDeConexao = "mysql:host=localhost;dbname=lavajato";
        self::$usuarioDoBanco = "root";
        self::$senhaDoBanco = "root";
    }
}

?>
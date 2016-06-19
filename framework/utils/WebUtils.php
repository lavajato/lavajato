<?php 

namespace senac\framework\utils;

use \senac\lavajato\AppConfig;

class WebUtils {

    public static function ImprimirRota($rota) {
        echo ($rota);
    }

    public static function PegarRota($rota) {
        return (/*AppConfig::$caminhoRelativo*/ __DIR__ . $rota);
    }

    // public static function PegarAsset($caminho) {
    //     echo(AppConfig::$assets . $caminho); 
    // }

    

}



?>
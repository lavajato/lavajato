<?php 

namespace senac\lavajato\actionResults;

use \senac\lavajato\AppConfig;

class Redirecionar implements IActionResult {
    public function __construct($rota) {
        header("Location: " . AppConfig::$caminhoRelativo . $rota, true, 302);
        die();        
    }
}

?>
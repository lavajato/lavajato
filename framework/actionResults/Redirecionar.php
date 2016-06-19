<?php 

namespace senac\framework\actionResults;

class Redirecionar implements IActionResult {
    public function __construct($rota) {
        header("Location: " . __DIR__ /*AppConfig::$caminhoRelativo*/ . $rota, true, 302);
        die();        
    }
}

?>
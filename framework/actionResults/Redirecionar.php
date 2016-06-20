<?php 

namespace senac\framework\actionResults;

class Redirecionar implements IActionResult {
    public function __construct($rota, $mensagem = null, $tipoDeRetorno = null) {
        if(isset($mensagem)) {
            $_SESSION["retornoDoRedirecionamento"] = Array($tipoDeRetorno => $mensagem);
        }

        header("Location: " . $rota, true, 302);
        
        exit(0);        
    }
}

?>
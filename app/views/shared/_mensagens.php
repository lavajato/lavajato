<?php
    if(isset($_SESSION["retornoDoRedirecionamento"])) {
        $retorno = $_SESSION["retornoDoRedirecionamento"];
        $alerta = "";

        switch (key($retorno)) {
            case 'sucesso':
                $alerta = "<script> toastr['success']('" . $retorno[key($retorno)] ."');</script>";
                break;
            
            case 'erro':
                $alerta = "<script> toastr['error']('" . $retorno[key($retorno)] . "');</script>";
                break;

            default:
                $alerta = "<script> toastr['info']('" . $retorno[key($retorno)] . "');</script>"; 
                break;
        }
        
        echo $alerta;
        session_unset();
    }

?>
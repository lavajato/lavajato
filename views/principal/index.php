<?php 
$titulo = "Principal";
$tituloDoFormulario = "Principal";
$iconeDoFormulario = "fa-home";
ob_start();
?>

<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
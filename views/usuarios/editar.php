<?php use senac\lavajato\utils\web\WebUtils; ?>
<?php use senac\lavajato\viewModels\UsuarioViewModel; ?>

<?php 
$titulo = "Editar Usuário";
$tituloDoFormulario = "Editar Usuário";
$iconeDoFormulario = "fa-users";
ob_start();
?>


<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
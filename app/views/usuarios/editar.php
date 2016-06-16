<?php use senac\lavajato\utils\web\WebUtils; ?>
<?php use senac\lavajato\viewModels\UsuarioViewModel; ?>

<?php 
$titulo = "Editar Usuário";
$tituloDoFormulario = "Editar Usuário";
$iconeDoFormulario = "fa-users";
ob_start();
?>

<h3> <?php echo $model->pegarNome(); ?> </h3>

<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
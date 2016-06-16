<?php use senac\lavajato\utils\web\WebUtils; ?>
<?php use senac\lavajato\viewModels\UsuarioViewModel; ?>

<?php 
$titulo = "Manter Usuários";
$tituloDoFormulario = "Manter Usuários";
$iconeDoFormulario = "fa-users";
ob_start();
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> Usuários  </h5>
            </div>
            <div class="ibox-content">
                <?php WebUtils::tabela(new UsuarioViewModel(), array(new UsuarioViewModel("nuin", "huihib", "Laura", "Lusilvio"))); ?>
            </div>
        </div>
    </div>
</div>

<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
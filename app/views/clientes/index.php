<?php use senac\lavajato\utils\web\WebUtils; ?> 
<?php use senac\lavajato\viewModels\ClienteDaListaViewModel; ?> 

<?php 
$titulo = "Manter Clientes";
$tituloDoFormulario = "Manter Clientes";
$iconeDoFormulario = "fa-users";
ob_start();
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> Clientes  </h5>

            </div>
            <div class="ibox-content">
                <?php WebUtils::Tabela(new ClienteDaListaViewModel(), $model->clientes(), array("Editar" => WebUtils::PegarRota("/Clientes/Editar"))); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <input type="button" class="btn btn-white btn-voltar" value="Voltar" />
        <a href="<?php WebUtils::ImprimirRota('/Clientes/Cadastrar') ?>" class="btn btn-primary"> + <i class="fa fa-user"></i> Novo Cliente </a>
    </div>
</div>

<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
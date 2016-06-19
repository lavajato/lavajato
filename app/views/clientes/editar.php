<?php use senac\lavajato\utils\web\WebUtils; ?> 
<?php use senac\lavajato\viewModels\ClienteViewModel; ?> 

<?php 
$titulo = "Editar Cliente";
$tituloDoFormulario = "Editar Cliente";
$iconeDoFormulario = "fa-users";
ob_start();
?>

<form role="form">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Dados do Cliente </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txt-nome-usuario"> Nome </label>
                                <input type="text" placeholder="Nome do cliente" id="txt-nome-usuario" class="form-control" value="<?php echo $model->nome ?>">
                            </div>

                            <div class="form-group">
                                <label for="txt-senha-usuario"> Senha </label>
                                <input type="text" placeholder="Senha do usuário" id="txt-senha-usuario" class="form-control" value="<?php echo $model->senha ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txt-email-usuario">Email</label>
                                <input type="email" placeholder="Email do usuário" id="txt-email-usuario" class="form-control" value="<?php echo $model->email ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div style="float:left">
                <input class="btn btn-white btn-voltar" type="button" class="btn btn-white" value="Voltar" />
            </div>
            <div style="float:right">
                <input type="button" class="btn btn-primary" value="Alterar" />
            </div>
        </div>
    </div>
</form>

<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
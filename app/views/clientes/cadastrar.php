
<?php use senac\lavajato\utils\web\WebUtils; ?> 
<?php use senac\lavajato\viewModels\ClienteViewModel; ?> 

<?php 
$titulo = "Cadastrar Novo Cliente";
$tituloDoFormulario = "Cadastrar Novo Cliente";
$iconeDoFormulario = "fa-users";
ob_start();
?>

<?php WebUtils::iniciarFormulario('ninonio', 'iojionno') ?>
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
                                <label for="txt-nome-cliente"> Nome </label>
                                <input type="text" placeholder="Nome do Cliente" id="txt-nome-cliente" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="txt-senha-cliente"> Senha </label>
                                <input type="password" placeholder="Senha do cliente" id="txt-senha-cliente" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txt-email-cliente">Email</label>
                                <input type="email" placeholder="Email do Cliente" id="txt-email-cliente" class="form-control">
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
                <input type="submit" class="btn btn-primary" value="Cadastrar" />
            </div>
        </div>
    </div>
<?php WebUtils::terminarFormulario() ?>

<?php 
$conteudo = ob_get_clean();
include_once("\\..\\shared\\_layout.php");
?>
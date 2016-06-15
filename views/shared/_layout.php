<?php use\senac\lavajato\AppConfig; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lava Jato - <?php echo isset($titulo) ? $titulo : "" ?> </title>

    <link href="<?php AppConfig::pegarAsset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php AppConfig::pegarAsset('css/font-awesome.min.css') ?>" rel="stylesheet">

    <link href="<?php AppConfig::pegarAsset('css/animate.css') ?>" rel="stylesheet">
    <link href="<?php AppConfig::pegarAsset('css/style.min.css') ?>" rel="stylesheet">

</head>

<body class="">
    <div id="wrapper">
        <?php include_once "_menu.php" ?>

        <div id="page-wrapper" class="gray-bg">
            <?php include_once "_cabecalhoFormulario.php" ?>

            <div class="wrapper wrapper-content">
                <?php echo isset($conteudo) ? $conteudo : "" ?>
            </div>

            <?php include_once "_rodape.php" ?>
        </div>
    </div>

    <script src="<?php AppConfig::pegarAsset('js/jquery-2.1.1.js') ?>"></script>
    <script src="<?php AppConfig::pegarAsset('js/bootstrap.min.js') ?>"></script>
    <script src="<?php AppConfig::pegarAsset('js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?php AppConfig::pegarAsset('js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <script src="<?php AppConfig::pegarAsset('js/inspinia.js') ?>"></script>
    <script src="<?php AppConfig::pegarAsset('js/plugins/pace/pace.min.js') ?>"></script>
</body>

</html>
<?php $titulo = $post->titulo ?>

<?php ob_start() ?>

<div style="margin-left: 100px">

    <h2> <?php echo $post->titulo ?> </h2>
    <p> Criado por <b><?php echo $post->autor ?></b> em <b><?php echo $post->data ?></b> </p>
    <p> <?php echo $post->texto ?> </p>
    
    <a href="Index"> <-- Voltar </a>    
</div>

<?php $conteudo = ob_get_clean() ?>

<?php include_once "_layout.php" ?>
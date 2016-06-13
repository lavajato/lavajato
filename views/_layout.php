<!DOCTYPE html>
<html>

<head>
    <title> <?php echo $titulo ?> </title>
</head>

<body>
    <div style="padding-left: 30px; padding-top: 20px; margin-bottom: 50px;">
        <h1> My Blog </h1>
    </div>
    <?php echo isset($conteudo) ? $conteudo : "" ?>
</body>

</html>
<?php $titulo = "MyBlog" ?>

<?php ob_start() ?>

<div style="float: left; width: 70%; margin-left: 100px">
    <?php if(count($posts) == 0): ?>
        <p> Nenhum post encontrado </p>
    <?php else: ?>
        <?php foreach($posts as $post):  ?>
            <div>
                <a href="Pegar?id=<?php echo $post->id ?>" style='font-size: 20px; font-weight: bold;margin-bottom: -12px;'> <?php echo $post->titulo ?> </a>
                <p style='font-size: 12px; color:gray'>Postado por <b> <?php echo $post->autor ?> </b> em <b> <?php echo $post->data ?> </b> </p>
                <p> <?php echo $post->texto ?>  </p>
            </div>
            <br /> 
        <?php endforeach ?>
    <?php endif ?>
</div>

<div style="float: left; width: 20%; background-color:lightgray">
    <form action="Inserir" method="POST">
        <fieldset style="border: none">
            <legend style="font-weight:bold"> Novo Post </legend><br/>

            <div>
                <label> Título: </label>
                <br/>
                <input type="text" name="titulo" maxlength="80" required />
            </div>

            <div>
                <label> Text: </label>
                <br/>
                <textarea name="texto" rows="5" required> </textarea>
            </div>
            <br/>
            <div>
                <button> Postar </button>
            </div>
        </fieldset>
    </form>
</div>

<?php $conteudo = ob_get_clean() ?>

<?php include_once "_layout.php" ?>
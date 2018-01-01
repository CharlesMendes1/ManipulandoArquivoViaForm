<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Titulo da pagina</title>
        <meta charset="iso-8859-1">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    </head>
    <body>
            <?php
                session_start();
            ?>
            <?php if(isset($_SESSION['erro'])): ?>
                 <ul>
                    <?php foreach ((array) $_SESSION['erro']  as $erro): ?>
                    <li><?= $erro; ?></li>
                    <?php endforeach; ?>
                 </ul>
            <?php endif; ?>


        <form action="cadastra_post.php" method="POST"  enctype="multipart/form-data">
            <label for="titulo">Titulo do POST:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo isset($_SESSION['titulo'])? $_SESSION['titulo']: ''?>"><br><br>
            <label for="titulo">Descrição : </label>
            <textarea name="descricao" row="6" cols="30"><?php echo isset($_SESSION['descricao'])? $_SESSION['descricao']: ''?></textarea><br><br>
            <label for="img">Adicionar imagem: </label>
            <input type="file" id="img" name="img"><br><br>
            <?php if(isset($_SESSION)){session_destroy();}?>
            <input type="submit" value="Enviar" id="salvar">
        </form>
    </body>
</html>
<?php
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        file_put_contents("aula27_guarda_form.txt",$nome,FILE_APPEND);
        
        // Redireciona
        header("Location: aula27_antif5.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Anti F5</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />
    </head>
    <body>
        <form method="POST">
            <input type="text" name="nome" />
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>
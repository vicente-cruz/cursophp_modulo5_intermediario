<?php
/**
 * Envia fotos via AJAX de duas formas:
 * Com FORM e sem FORM
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload fotos com ajax</title>
    </head>
    <body>
        <!--<form method="POST" enctype="multipart/form-data" action="recebedor.php">-->
        <!--<form id="form" method="POST" enctype="multipart/form-data" action="recebedor.php">-->
            Nome:<br/>
            <input type="text" name="nome" /><br/><br/>

            Foto:<br/>
            <input type="file" name="foto" /><br/><br/>

            <button>Enviar</button>
            <!--<input type="submit" value="Enviar" />-->
        <!--</form>-->
        <script type="text/javascript" src="../../assets/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
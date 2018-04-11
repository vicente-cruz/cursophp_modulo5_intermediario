<?php
if (isset($_FILES['arquivo']['tmp_name'])) {
    $num_arquivos = count($_FILES['arquivo']['tmp_name']);
    if ($num_arquivos > 0) {
        for ($i=0; $i<$num_arquivos; $i++) {
            $nomearquivo = md5($_FILES['arquivo']['name'][$i].time().rand(0,99)).'.arq';
            move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], './'.$nomearquivo);
        }
        
        echo "Arquivos enviados!<br><br>";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    Arquivo:<br>
    <input type="file" name="arquivo[]" multiple><br><br>
    
    <input type="submit" value="Enviar arquivos">
</form>
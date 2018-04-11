<?php
$arquivo = $_FILES['arquivo'];

if (isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {
    // Salva na pasta com um nome aleatorio
    $nomearquivo = md5(time().rand(0,99));
    move_uploaded_file($arquivo['tmp_name'],"./".$arquivo['name']);
    
    echo "Enviou com sucesso.";
}
?>
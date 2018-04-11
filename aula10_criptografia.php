<?php

$nome = "Vicente";
$nome_md5 = md5($nome);
$nome_base64 = base64_encode($nome);
echo "Nome: ".$nome." | MD5: ".$nome_md5." | Base64_Encode: ".$nome_base64." | Base64_Decode: ".base64_decode($nome_base64)."<br>";
?>
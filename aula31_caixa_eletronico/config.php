<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_caixaeletronico;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERRO:".$e->getMessage();
    exit;
}

?>
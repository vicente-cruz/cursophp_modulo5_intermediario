<?php
try {
    global $pdo;
    
    $pdo = new PDO("mysql:dbname=projeto_mmn;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}

$limite = 4;
?>
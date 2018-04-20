<?php
session_start();
require 'config.php';
require 'funcoes.php';

$sql = "SELECT id FROM usuarios";
$query = $pdo->query($sql);
$usuarios = array();

if ($query->rowCount() > 0) {
    $usuarios = $query->fetchAll();
    foreach ($usuarios as $chave => $usuario) {
        $usuarios[$chave]['filhos'] = calcular_cadastros($usuario['id'],$limite);
    }
}

$sql = "SELECT * FROM patentes ORDER BY minimo DESC";
$query = $pdo->query($sql);
$patentes = array();
if ($query->rowCount() > 0) {
    $patentes = $query->fetchAll();
}

foreach ($usuarios as $usuario) {
    foreach($patentes as $patente) {
        if (intval($usuario['filhos']) >= intval($patente['minimo'])) {
            $query = $pdo->prepare("UPDATE usuarios SET patente = :patente WHERE id = :id");
            $query->bindValue(":patente",$patente['id']);
            $query->bindValue(":id",$usuario['id']);
            $query->execute();
            
            break;
        }
    }
}
?>
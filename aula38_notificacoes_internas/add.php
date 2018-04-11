<?php

try {
    $pdo = new PDO('mysql:dbname=projeto_notificacoes;host=localhost','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "ERROR:".$e->getMessage();
    exit;
}

$prop = array(
    'curtidor' => '2',
    'id_foto' => '123'
);

$sql = "INSERT INTO notificacoes(id_user,notificacao_tipo,propriedades, link) VALUES (:id_user, :tipo, :prop, :link)";
$query = $pdo->prepare($sql);
$query->bindValue(":id_user",'1');
$query->bindValue(":tipo",'CURTIDA');
$query->bindValue(":prop", json_encode($prop));
$query->bindValue(":link",'http://www.meusite.com.br/foto/123');
$query->execute();
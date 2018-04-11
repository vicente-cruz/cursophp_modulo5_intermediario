<?php
try {
    $pdo = new PDO('mysql:dbname=projeto_notificacoes;host=localhost','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "ERROR:".$e->getMessage();
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1' AND lido = '0'";
$query = $pdo->query($sql);

$notificacoes = array(
    'qt' => 0
);

if ($query->rowCount() > 0) {
    $notificacoes['qt'] = $query->rowCount();
}

echo json_encode($notificacoes);
exit;
?>
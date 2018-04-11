<?php
try {
    $pdo = new PDO('mysql:dbname=projeto_notificacoes;host=localhost','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "ERROR:".$e->getMessage();
    exit;
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1'";
$query = $pdo->query($sql);

$retorno = array();
if ($query->rowCount() > 0) {
    foreach ($query->fetchAll() as $item) {
        $propriedades = json_decode($item['propriedades']);
        $retorno[] = array(
                'tipo' => $item['notificacao_tipo'],
                'mensagem' => (
                    $item['notificacao_tipo'] == "MSG" ?
                    $propriedades->msg."<br/>" :
                    $propriedades->curtidor.' curtiu a foto '.$propriedades->id_foto."<br/>"
                )
            );
    }
}

echo json_encode($retorno);
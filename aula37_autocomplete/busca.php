<?php
try {
//    $pdo = new PDO("pgsql:dbname=projeto_esquecisenha;host=10.76.64.83","postgres","&kVyhG<({t}[");
    $pdo = new PDO("mysql:dbname=projeto_esquecisenha;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "[ERROR]:".$e->getMessage();
    exit;
}

$usuarios = array();

if ( ! empty($_POST['texto'])) {
    $texto = addslashes($_POST['texto']);
    
    $sql = "SELECT * FROM usuarios WHERE email LIKE :texto";
    $query = $pdo->prepare($sql);
    $query->bindValue(':texto','%'.$texto.'%');
    $query->execute();
    
    if ($query->rowCount() > 0) {
        foreach($query->fetchAll() as $pessoa) {
            $usuarios[] = array('usuario'=>utf8_encode($pessoa['email']), 'id'=>$pessoa['id']);
        }
    }
}

echo json_encode($usuarios);
?>
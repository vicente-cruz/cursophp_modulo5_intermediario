<?php

// Conectando...
// Aula 17
$dsn = "mysql:dbname=curso_php;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

// Aula 18
try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Aula 19
//    $sql = "SELECT * FROM usuarios";
//    $sql = $pdo->query($sql);
//    
//    if ($sql->rowCount() > 0) {
//        foreach ($sql->fetchAll() as $usuario) {
//            echo "Nome: ".$usuario["nome"]." | Username: ".$usuario["usuario"]."<br>";
//        }
//    } else {
//        echo "Não retornou nada!<br>";
//    }
    
    // Aula 20
//    $nome = "usuario1";
//    $usuario = "user1";
//    $senha = md5("123");
//    $data = time();
//    $email = "user1@email.com";
//    $sql = "INSERT INTO usuarios SET usuario = '".$usuario."', senha = '".$senha."', nome = '".$nome."', data = '".$data."', email = '".$email."'";
//    echo $sql."<br>";
//    $sql = "INSERT INTO "
//            . "usuarios (usuario,senha,nome,data,email)"
//         . " VALUES "
//            . "('user1','".md5("senha1")."','usuario1','".date("d/m/Y")."','user1@email.com'),"
//            . "('user2','".md5("senha2")."','usuario2','".date("d/m/Y")."','user2@email.com'),"
//            . "('user3','".md5("senha3")."','usuario3','".date("d/m/Y")."','user3@email.com'),"
//            . "('user4','".md5("senha4")."','usuario4','".date("d/m/Y")."','user4@email.com'),"
//            . "('user5','".md5("senha5")."','usuario5','".date("d/m/Y")."','user5@email.com')";
//    $sql = $pdo->query($sql);
//    echo "Inseriu. ID: ".$pdo->lastInsertId()."<br>";
    
    // Aula 21
//    $sql = "UPDATE usuarios SET data = '".date("d/m/Y")."'";
//    $pdo->query($sql);
//    echo "Alterou!<br>";
    
    // Aula 22
    $sql = "DELETE FROM usuarios WHERE id = '5'";
    $pdo->query($sql);
    echo "Deletou!<br>";
} catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
}

?>
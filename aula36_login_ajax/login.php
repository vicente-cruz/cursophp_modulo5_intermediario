<?php
try {
//    $pdo = new PDO("pgsql:dbname=projeto_esquecisenha;host=10.76.64.83","postgres","&kVyhG<({t}[");
    $pdo = new PDO("mysql:dbname=projeto_esquecisenha;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERROR:".$e->getMessage();
    exit;
}

if (isset($_POST['email']) && ( ! empty($_POST['email']))) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $query = $pdo->prepare($sql);
    $query->bindValue(":email",$email);
    $query->bindValue(":senha",md5($senha));
    $query->execute();
  
    echo ($query->rowCount() > 0 ? "Usuário logado com sucesso!" : "E-mail e/ou senha errados!" );
}
else {
    echo "Digite um e-mail e/ou senha!";
}
?>
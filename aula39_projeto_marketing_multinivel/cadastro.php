<?php
session_start();
require 'config.php';

if (( ! empty($_POST['nome'])) && ( ! empty($_POST['email']))) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $id_pai = $_SESSION['mmnlogin'];
    $senha = md5($email);
    
    // E-mail ja cadastrado?
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $query->bindValue(":email",$email);
    $query->execute();
    
    if ($query->rowCount() == 0) {
        $query = $pdo->prepare("INSERT INTO usuarios(id_pai, nome, email, senha) VALUES (:id_pai, :nome, :email, :senha)");
        $query->bindValue("id_pai",$id_pai);
        $query->bindValue("nome",$nome);
        $query->bindValue("email",$email);
        $query->bindValue("senha",$senha);
        $query->execute();
        
        header("Location: index.php");
    }
    else {
        echo "Usuário já cadastrado!<br/>";
    }
}
?>
<h1>Cadastrar novo usuário</h1>
<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" /><br/><br/>
    
    E-mail:<br/>
    <input type="email" name="email" /><br/><br/>
    
    <input type="submit" valu="Cadastrar" />
</form>
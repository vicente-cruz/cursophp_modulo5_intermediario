<?php
session_start();
require 'config.php';

if ( ! empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $query = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
    $query->bindValue(":email",$email);
    $query->bindValue(":senha",$senha);
    $query->execute();
    
    if ($query->rowCount() > 0) {
        $usuario = $query->fetch();
        $_SESSION['mmnlogin'] = $usuario['id'];
        
        header("Location: index.php");
        exit;
    }
    else {
        echo "Usuário e/ou senha errados!<br/>";
    }
}
?>

<form method="POST">
    E-mail:<br/>
    <input type="email" name="email" /><br/><br/>
    
    Senha:<br/>
    <input type="password" name="senha" /><br/><br/>
    
    <input type="submit" value="Entrar" />
</form>
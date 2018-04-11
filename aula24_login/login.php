<?php
session_start();

require "config.php";

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    
    $sql = "SELECT * FROM usuarios WHERE email = '".$email."' AND senha = '".$senha."'";
    $sql = $pdo->query($sql);
    
    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch();
        
        $_SESSION['id'] = $usuario['id'];
        header("Location: index.php");
    }
}
?>

<form method="POST">
    E-mail:<br>
    <input type="text" name="email"><br><br>
    Senha:<br>
    <input type="text" name="senha"><br><br>
    <input type="submit" name="enviar">
</form>
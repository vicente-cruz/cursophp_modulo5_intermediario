<?php
session_start();
require "config.php";

if ( ! empty($_GET['codigo'])) {
    $codigo = addslashes($_GET['codigo']);
    
    $sql = "SELECT * FROM usuarios WHERE codigo = '".$codigo."'";
    $query = $pdo->query($sql);
    
    if ($query->rowCount() > 0) {
        
    }
    else {
        header("Location: login.php");
        exit;        
    }
}
else {
    header("Location: login.php");
    exit;
}

if ( ! empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $sql = "SELECT * FROM usuarios WHERE email = '".$email."'";
    $query = $pdo->query($sql);
    
    if ($query->rowCount() <= 0) {
        
        $codigo = md5(rand(0,99999).rand(0,99999));
        $sql = "INSERT INTO usuarios(email, senha, codigo) VALUES ('".$email."','".$senha."','".$codigo."')";
        $query = $pdo->query($sql);
        
        unset($_SESSION['logado']);
        
        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Aula 30 - Registro por convite</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">
            <div class="login">
                <h2>Cadastrar</h2>
                <form method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-envelope fa-fw"></span></span>
                            <input type="email" name="email" class="form-control" placeholder="E-mail"/>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-lock fa-fw"></span></span>
                            <input type="password" name="senha" class="form-control" placeholder="Senha"/>
                        </div>
                        <br/>
                        <input type="submit" value="Cadastrar" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
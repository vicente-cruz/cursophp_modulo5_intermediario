<?php
session_start();
require "config.php";

if ((isset($_POST['email'])) && ( ! empty($_POST['email']))) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $sql = "SELECT id FROM usuarios WHERE email = '".$email."' AND '".$senha."'";
    $query = $pdo->query($sql);
    
    if ($query->rowCount() > 0) {
        $dado = $query->fetch();
        
        $_SESSION['logado'] = $dado['id'];
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aula 30 - Registro por Convite</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" contente="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="login">
                <h2>Página de Login</h2>
                <form method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-envelope fa-fw"></span></span>
                            <input type="email" name="email" placeholder="E-mail" class="form-control"/>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-key fa-fw"></span></span>
                            <input type="password" name="senha" placeholder="senha" class="form-control" />
                        </div>
                    </div>
                    <br/>
                    <input type="submit" value="Entrar" class="btn btn-default" />
                    <a href="cadastrar.php" class="btn btn-primary">Cadastrar</a>
                </form>
            </div>
        </div>
    </body>
</html>
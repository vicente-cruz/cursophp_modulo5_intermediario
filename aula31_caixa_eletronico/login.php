<?php
session_start();
require "config.php";

if (isset($_POST['agencia']) && ( ! empty($_POST['agencia']))) {
    $agencia = addslashes($_POST['agencia']);
    $conta = addslashes($_POST['conta']);
    $senha = md5($_POST['senha']);
    
    $query = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
    $query->bindValue(":agencia", $agencia);
    $query->bindValue(":conta", $conta);
    $query->bindValue(":senha", $senha);
    $query->execute();
    
    if ($query->rowCount() > 0) {
        $dado = $query->fetch();
        
        $_SESSION['banco'] = $dado['id'];
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Caixa Eletrônico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>
        <script type="text/javascript" src="../../assets/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/font-awesome-4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Acesse sua conta</h1>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <form method="POST">
                            <div class="input-group">
                                <span class="input-group-addon">Ag:</span>
                                <input type="number" name="agencia" class="form-control" />
                            </div><br/>
                            <div class="input-group">
                                <span class="input-group-addon">Cc:</span>
                                <input type="number" name="conta" class="form-control" />
                            </div><br/>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                <input type="password" name="senha" class="form-control" />
                            </div><br/><br/>
                            <input type="submit" value="Entrar" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
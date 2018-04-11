<?php
session_start();
require "config.php";

if (isset($_POST['tipo'])) {
    
    $tipo = $_POST['tipo'];
    $valor = str_replace(",",".",$_POST['valor']);
    $valor = floatval($valor);
    
    $query = $pdo->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())");
    $query->bindValue(":id_conta", $_SESSION['banco']);
    $query->bindValue(":tipo", $tipo);
    $query->bindValue(":valor", $valor);
    $query->execute();
    
    // 0 = deposito, 1 = saque
    $query = $pdo->prepare("UPDATE contas SET saldo = saldo ".($tipo == '0' ? "+" : "-")." :valor WHERE id = :id");
    $query->bindValue(":valor",$valor);
    $query->bindValue(":id",$_SESSION['banco']);
    $query->execute();
    
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Caixa Eletrônico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scal=1.0"/>
        <script type="text/javascript" src="../../assets/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/font-awesome-4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Adicionar Transação</h1>
                </div>
                <div class="panel-body">
                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group" style="width:350px;">
                                <span class="input-group-addon"><span class="fa fa-credit-card fa-fw"></span> Tipo de transação</span>
                                <select name="tipo" class="form-control">
                                    <option></option>
                                    <option value="0">Depósito</option>
                                    <option value="1">Retirada</option>
                                </select>
                            </div><br/>
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i> Valor</span>
                                <input type="text" name="valor" pattern="[0-9.,]{1,}" class="form-control"/>
                            </div>
                            <br/>
                            <input type="submit" value="Adicionar" class="btn btn-default" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
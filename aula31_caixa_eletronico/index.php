<?php
session_start();
require "config.php";

if (isset($_SESSION['banco']) && ( ! empty($_SESSION['banco']))) {
    $id = $_SESSION['banco'];
    
    $query = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $query->bindValue(":id",$id);
    $query->execute();
    
    if ($query->rowCount() > 0) {
        $dado = $query->fetch();
    }
    else {
        header("Location: login.php");
    }
}
else {
    header("Location: login.php");
    exit;
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
                    <h1 class="panel-title">Banco XYZ</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">Titular: <?php echo $dado['titular']; ?></div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-12">Agência: <?php echo $dado['agencia']; ?></div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-12">Conta: <?php echo $dado['conta']; ?></div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-12">Saldo: R$ <?php echo $dado['saldo']; ?></div>
                    </div><br/><br/>
                    <div class="row">
                        <div class="col-md-12"><a href="sair.php" class="btn btn-default">Sair</a></div>
                    </div>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h1 class="panel-title">Movimentação/Extrato</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="add_transacao.php" class="btn btn-default">Adicionar transação</a>
                        </div>
                    </div><br/>
                    <table class="table table-bordered" width="400">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta");
                            $query->bindValue(":id_conta",$id);
                            $query->execute();
                            
                            if ($query->rowCount() > 0) {
                                foreach ($query->fetchAll() as $item):
                        ?>
                            <tr class="<?php echo ( ($item['tipo'] == 0) ? "success" : "danger");?>">
                                <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                                <td>R$ <?php echo $item['valor']; ?></td>
                            </tr>
                        <?php
                                endforeach;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
session_start();
require 'config.php';
require 'funcoes.php';

if (empty($_SESSION['mmnlogin'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['mmnlogin'];
$query = $pdo->prepare(""
        . "SELECT"
        . " usu.nome AS nome, "
        . " pat.nome AS patente "
        . "FROM"
        . " usuarios AS usu "
        . "INNER JOIN"
        . " patentes AS pat "
        . "ON"
        . " pat.id = usu.patente "
        . "WHERE"
        . " usu.id = :id");
$query->bindValue(":id",$id);
$query->execute();

if ($query->rowCount() > 0) {
    $usuario = $query->fetch();
    $nome = $usuario['nome'];
    $patente = $usuario['patente'];
}
else {
    header("Location: login.php");
    exit;
}

$usuarios_cadastrados = listar($id,$limite);

?>
<h1>Sistema de Marketing Multinível</h1>
<h2>Usuário logado: <?php echo $nome." (".$patente.")"; ?></h2>

<a href="cadastro.php">Cadastrar novo usuário</a><br/>

<a href="sair.php">Sair</a>

<hr/>
<h4>Lista de cadastros</h4>
<?php
exibir($usuarios_cadastrados);
?>

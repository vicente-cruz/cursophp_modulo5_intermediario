<?php
session_start();

require "config.php";

if (empty($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$email = "";
$sql = "SELECT * FROM usuarios WHERE id = '".addslashes($_SESSION['logado'])."'";
$query = $pdo->query($sql);
if ($query->rowCount() > 0) {
    $info = $query->fetch();
    $email = $info['email'];
    $codigo = $info['codigo'];
}
?>
<h1>Área interna do sistema</h1>
<p>Usuário: <?php echo $email; ?> - <a href="sair.php">Sair</a></p>
<p>Link: http://cursophp.pc/projeto_registro_por_convite/cadastrar.php?codigo=<?php echo $codigo; ?></p>
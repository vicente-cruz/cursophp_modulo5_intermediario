<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "ERRO:".$e->getMessage();
}

$ordem = ( (isset($_GET['ordem']) && ( ! empty($_GET['ordem']))) ? addslashes($_GET['ordem']) : "" );
?>

<form method="GET">
    <select name="ordem" onchange="this.form.submit()">
        <option></option>
        <option value="nome" <?php echo ($ordem == "nome" ? "selected" : "") ?>>Pelo nome</option>
        <option value="idade" <?php echo ($ordem == "idade" ? "selected" : "") ?>>Pela idade</option>
    </select>
</form>

<table border="1" width="400">
    <tr>
        <th>Nome</th>
        <th>Idade</th>
    </tr>
    <?php
    $sql = "SELECT * FROM usuarios ".( ! empty($ordem) ? " ORDER BY ".$ordem : "" );
    $query = $pdo->query($sql);
    if ($query->rowCount() > 0) {
        foreach ($query->fetchAll() as $usuario):
    ?>
    <tr>
        <td><?php echo $usuario['nome']; ?></td>
        <td><?php echo $usuario['idade']; ?></td>
    </tr>
    <?php
        endforeach;
    }
    ?>
</table>
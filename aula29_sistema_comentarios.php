<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_comentarios;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERRO:".$e->getMessage();
    exit;
}

if (isset($_POST['nome']) && ( ! empty($_POST['nome']))) {
    $nome = addslashes($_POST['nome']);
    $msg = addslashes($_POST['mensagem']);
    
    $query = $pdo->prepare("INSERT INTO mensagens SET nome = :nome, msg = :msg, data_msg = NOW()");
    $query->bindValue(":nome",$nome);
    $query->bindValue(":msg",$msg);
    $query->execute();
}
?>
<fieldset>
    <legend>Mensagens</legend>
    <form method="POST">
        Nome:<br/>
        <input type="text" name="nome" /><br/><br/>
        
        Mensagem:<br/>
        <textarea name="mensagem"></textarea><br/><br/>
        
        <input type="submit" value="Enviar mensagem" />
    </form>
</fieldset>
<br/><br/>

<?php
$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
$query = $pdo->query($sql);
if ($query->rowCount() > 0) {
    foreach($query->fetchAll() as $mensagem):
?>
<strong><?php echo $mensagem['nome']." - ".$mensagem['data_msg']?></strong><br/>
<?php echo $mensagem['msg']?>
<hr/>
<?php        
    endforeach;
}
else {
    echo "Não há mensagens";
}
?>
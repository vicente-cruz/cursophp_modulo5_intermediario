<?php

$dado = addslashes($_POST['dado']);

$sql = "SELECT * FROM tabela WHERE dado = ".$dado;

?>
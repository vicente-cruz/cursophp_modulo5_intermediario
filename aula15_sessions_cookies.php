<?php
// Cria e mantem sessao enquanto browser estiver aberto ou o usuário não se desloga
session_start();

$_SESSION["nome_sessao"] = "Vicente Cruz";

// Cria cookie
setcookie("teste_cookie",$_SESSION["nome_sessao"], time()+3600);

echo "Cookie: ".$_COOKIE["teste_cookie"];
?>
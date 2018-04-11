<?php

echo "Foreach Array Simples:<br>";
$nomes = array("Fulano", "Beltrano", "Cicrano", "Ninguem");
foreach ($nomes as $nome) {
    echo $nome."<br>";
}

echo "<br>Foreach Array Complexo:<br>";
$alunos = array(
    array("nome" => "Fulano", "idade" =>10),
    array("nome" => "Beltrano", "idade" =>20),
    array("nome" => "Cicrano", "idade" =>30),
    array("nome" => "Ninguem", "idade" =>40),
);
foreach ($alunos as $aluno) {
    echo "<br>".$aluno["nome"]." - ".$aluno["idade"];
}


echo "<br>Foreach Array Bem Complexo:<br>";
$pessoa = array(
    "nome" => "Fulano",
    "idade" => 10,
    "estado" => "RS",
    "pais" => "BR"
);
foreach ($pessoa as $dados) {
    echo $dados."<br>";
}

foreach ($pessoa as $key => $dado) {
    echo $key." - ".$dado."<br>";
}
?>
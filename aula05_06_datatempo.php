<?php

// Aula 5 - Funcao Date
// d = dia c/zero à esquerda, j = dia s/zero à esquerda, D = dia da semana
//$dataatual = date("d/m/Y");
//$dataatual = date("d/m/Y H:i:s");
//$dataatual = date("d/m/Y \à\s H:i:s");
$dataatual = date("\D\i\a\: d/m/Y \à\s H:i:s");
echo "Funcao data: ".$dataatual."<br><br>";

// Aula 6 - Funcao time(), mktime(), strtotime()
// Toda função tempo inicia em 10/01/1970 em segundos
$timeatual = time();
echo "Funcao time: ".$timeatual."<br><br>";

//mktime() -> passa "tempo exato" - retorna diferença em segundos entre o inicio dos
//tempos (marco zero) e o tempo exato passado
$mktimeatual = mktime()."<br><br>";

// strtotime() -> Converte tempo para string
// Boa para calcular o tempo faltante, a partir de hoje, até a data de entrega de
// algum produto...
// ex: strtotime("+1 day"); -> tempo em segundos de hoje até 2 dias
echo strtotime("+2 days")."<br/><br/>";

// Mostra a data do "marco zero"
$inicio_tempo = date('d/m/Y', 0);
echo "Inicio dos tempos: ".$inicio_tempo."<br/><br/>";

// Mostra a data do inicio dos tempos +2 dias
$inicio_tempo = date('d/m/Y', strtotime("+2 days", 0));
echo "Inicio dos tempos + 2 dias: ".$inicio_tempo."<br/><br/>";

// Ex: Pega o valor retornado em strtotime("+2 days") -> Data de hoje + 2 dias
// e converte em 'd/m/Y'
$dataproxima = date('d/m/Y', strtotime("+2 days"));
echo "Data daqui a dois dias: ".$dataproxima;
?>
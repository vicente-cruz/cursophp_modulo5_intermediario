<?php

$nome = "Vicente Silva Cruz";

$partes = explode(" ",$nome);
echo "explode:<br>";
print_r($partes);

echo "<br>implode:".implode(" - ", $partes)."<br>";
echo "Number format:".  number_format(85896.45698712, 2, ',','')."<br>";

$texto = "O Rato Roeu a Roupa";
echo "String Replace, de Roeu por Comeu: ".str_replace("Roeu", "Comeu", $texto)."<br>";
echo "strtolower: ".strtolower($texto)." - strtoupper: ".strtoupper($texto)."<br>";
echo "substring: '".substr($texto,0,5)."'<br>";
?>
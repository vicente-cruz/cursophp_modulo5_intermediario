<?php

$teste = array(
    "nome" => "Vicente",
    "idade" => "trinta e cinco",
    "cidade" => "Porto Alegre",
    "estado" => "RS",
    "pais" => "Brasil"
);

echo "Array Keys: ";
print_r(array_keys($teste));

echo "<br>Array Values: ";
print_r(array_values($teste));

echo "<br>Array Pop. Popped Item: ".array_pop($teste)."<br>";
print_r($teste);

echo "<br>Array Shift. Shifted Item: ".array_shift($teste)."<br>";
print_r($teste);

echo "<br>ASort: ";
asort($teste);
print_r($teste);

echo "<br>ARSort: ";
arsort($teste);
print_r($teste);

echo "<br>Count: ".count($teste)."<br>";

echo "in_array: ".(in_array("trinta e cinco", $teste) ? "TRUE" : "FALSE")."<br>";
?>
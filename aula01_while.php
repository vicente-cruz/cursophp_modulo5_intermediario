<?php

$x = 0;
echo "Pré-Incremento!<br>";
while ($x < 10) {
    echo ++$x."<br>";
}

$x = 0;
echo "Pós-Incremento!<br>";
while ($x < 10) {
    echo $x++."<br>";
}
?>
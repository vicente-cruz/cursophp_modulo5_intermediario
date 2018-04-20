<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_tags;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "[ERROR]: ".$e->getMessage();
}

$lista = array();

$sql = "SELECT caracteristicas FROM usuarios";
$query = $pdo->query($sql);
if ($query->rowCount() > 0) {
    $usuarios = $query->fetchAll();
    
    $caracteristicas = array();
    foreach ($usuarios as $usuario) {
        $palavras = explode(',',$usuario['caracteristicas']);
        
        foreach($palavras as $palavra) {
            $palavra = trim($palavra);
            
            if (isset($caracteristicas[$palavra])) {
                $caracteristicas[$palavra]++;
            }
            else {
                $caracteristicas[$palavra] = 1;
            }
        }
    }
    
    arsort($caracteristicas);
    
    $palavras = array_keys($caracteristicas);
    $contagens = array_values($caracteristicas);
    $maior = max($contagens);
    $tamanhos = array(11,15,20,30);
    
    for ($i = 0; $i<count($palavras); $i++) {
        $peso = $contagens[$i] / $maior;
        
        $h = ceil($peso * count($tamanhos));
        
        echo "<p style='font-size:".$tamanhos[$h-1]."px'>".$palavras[$i]." (".$contagens[$i].")</p>";
    }
}
?>
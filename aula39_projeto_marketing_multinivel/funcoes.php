<?php
function listar($id, $limite)
{
    $lista = array();
    global $pdo;
    
    $query = $pdo->prepare(
            "SELECT"
            . " usu.id AS id, "
            . " usu.id_pai AS id_pai, "
            . " usu.patente AS patente, "
            . " usu.nome AS nome, "
            . " pat.nome AS patente "
            . "FROM"
            . " usuarios AS usu "
            . "INNER JOIN"
            . " patentes AS pat "
            . "ON"
            . " usu.patente = pat.id "
            . "WHERE"
            . " id_pai = :id"
            );
    $query->bindValue(":id",$id);
    $query->execute();

    if ($query->rowCount() > 0) {
        $lista = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($lista as $chave => $usuario) {
            $lista[$chave]['filhos'] = array();
            if ($limite > 0) {
                $lista[$chave]['filhos'] = listar($usuario['id'],$limite-1);
            }
        }
    }
    
    return $lista;
}

function exibir($array)
{
    echo "<ul>";
    foreach($array as $item) {
        echo "<li>";
        echo $item['nome']." (".$item['patente'].")";
        
        if (count($item['filhos']) > 0) {
            exibir($item['filhos']);
        }
        
        echo "</li>";
    }
    echo "</ul>";
}

function calcular_cadastros($id,$limite)
{
    $lista = array();
    global $pdo;
    
    $query = $pdo->prepare(
            "SELECT"
            . " * "
            . "FROM"
            . " usuarios "
            . "WHERE"
            . " id_pai = :id "
        );
    $query->bindValue(":id",$id);
    $query->execute();
    
    $filhos = $query->rowCount();
    if ($filhos > 0) {
        $lista = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($lista as $key => $usuario) {
            if ($limite > 0) {
                $filhos += calcular_cadastros($usuario['id'],$limite-1);
            }
        }
    }
    
    return $filhos;
}
?>
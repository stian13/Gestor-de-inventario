<?php
include ('./db.php');

$query_comentarios = "SELECT * FROM bitacora_pc";
#---------------------------------------------------
#Funciones

function ejecutorQueryAndTransfor ($conexion, $consulta){
    $array = array();
    $ejecucion = $conexion -> query($consulta);
    while ($rows = $ejecucion -> fetch_assoc()){
        $array[] = $rows;
    }
    return $array;
}

$transforComentarios = ejecutorQueryAndTransfor($mysqli, $query_comentarios);

echo json_encode($transforComentarios);    
?>
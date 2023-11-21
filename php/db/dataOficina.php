<?php
include ('./db.php');

$query_call_table_oficina = "SELECT * FROM ofic";
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

$transforInfoOficinas = ejecutorQueryAndTransfor($mysqli, $query_call_table_oficina);

echo json_encode($transforInfoOficinas);
?>
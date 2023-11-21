<?php
include ('./db.php');
#query, consulta preparada
$query_call_table_pc = "SELECT * FROM computadoras";
$query_call_table_pc_Ofi = "SELECT * FROM `computadoras` JOIN ofic ON computadoras.id_ofice_pc = ofic.id_oficinas";
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
/*--------------------------------*/
$transforInfoPc = ejecutorQueryAndTransfor($mysqli, $query_call_table_pc_Ofi);
echo json_encode($transforInfoPc);
?>


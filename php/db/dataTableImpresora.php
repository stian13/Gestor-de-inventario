<?php
include('./db.php');
$query_all_table_impresora = "SELECT * FROM `impresoras_scaners` JOIN ofic ON id_oficina_impre = id_oficinas LEFT JOIN bitacoras_impresoras ON id_imp_scan = id_impre_scan LEFT JOIN admin_tec ON id_name_admin = id_admin_tec";

$resul = $mysqli -> query($query_all_table_impresora);

$impresoras_scaners = array();
while($row = $resul -> fetch_assoc()){
    $id_impre_scan = $row ['id_imp_scan'];

    if(!isset($impresoras_scaners[$id_impre_scan])){
        $impresoras_scaners[$id_impre_scan] = $row;
        $impresoras_scaners[$id_impre_scan]['comentarios'] = array();
    }
    $comentario = array (
        'id_bitacora' => $row['id_bitacora'],
        'fecha' => $row['fecha'],
        'parrafo' => $row['parrafo'],
        'id_name_admin' => $row['id_name_admin'],
        'nombre_user' => $row['nombre_user'],
        'apodo_user' => $row['apodo_user'],
    );
    $impresoras_scaners[$id_impre_scan]['comentarios'][] = $comentario;
}

echo json_encode (array_values($impresoras_scaners));
?>
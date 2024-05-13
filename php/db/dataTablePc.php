<?php
include ('./db.php');
#query, consulta preparada
$query_call_table_pc = "SELECT * FROM `computadoras` JOIN ofic ON id_ofice_pc = id_oficinas LEFT JOIN bitacora_pc ON id_computador = id_pc LEFT JOIN admin_tec ON id_admin = id_admin_tec";
#$query_call_table_pc_Ofi = "SELECT * FROM `computadoras` JOIN ofic ON computadoras.id_ofice_pc = ofic.id_oficinas";
#---------------------------------------------------
$result = $mysqli -> query($query_call_table_pc);

$computadoras= array();
while ($row = $result -> fetch_assoc()){
    $id_computadora = $row['id_computador'];

    // Si la computadora aún no está en el array $computadoras, agregamos la fila completa
    if (!isset($computadoras[$id_computadora])) {
        $computadoras[$id_computadora] = $row;
        // Inicializamos un array para almacenar los comentarios de esta computadora
        $computadoras[$id_computadora]['comentarios'] = array();
    }

    //$computadoras [] = $row;

    // Agregamos el comentario actual al array de comentarios de esta computadora
    $comentario = array(
        'id_bitacira_pc' => $row['id_bitacira_pc'],
        'fecha' => $row['fecha'],
        'nota_pc' => $row['nota_pc'],
        'id_admin' => $row['id_admin'],
        'nombre_user' => $row['nombre_user'],
        'apodo_user' => $row['apodo_user'],
        'contrasena' => $row['contrasena'],
        'correo' => $row['correo'],
        'codigo_recuperacion' => $row['codigo_recuperacion']
    );
    $computadoras[$id_computadora]['comentarios'][] = $comentario;

}
// Convertimos el array de computadoras a formato JSON
echo json_encode(array_values($computadoras));
//echo json_encode($computadoras);


<?php
include ('./db.php');
#query, consulta preparada
$query_call_table_pc = "SELECT * FROM `computadoras` JOIN ofic ON id_ofice_pc = id_oficinas LEFT JOIN bitacora_pc ON id_computador = id_pc LEFT JOIN admin_tec ON id_admin = id_admin_tec";
#$query_call_table_pc_Ofi = "SELECT * FROM `computadoras` JOIN ofic ON computadoras.id_ofice_pc = ofic.id_oficinas";
#---------------------------------------------------
$result = $mysqli -> query($query_call_table_pc);

$computadorasConComentarios = array();

while ($row = mysqli_fetch_assoc($result)) {
    $idComputadora = $row['id_computador'];

    // Si la computadora aún no está en el array, agrégala
    if (!isset($computadorasConComentarios[$idComputadora])) {
        $computadorasConComentarios[$idComputadora] = array(
            'id_computador' => $row['id_computador'],
            'code_invet' => $row ['code_invet'],
            'nameUser' => $row ['nameUser'],
            'tipo_pc' => $row ['tipo_pc'],
            'marca_pc' => $row ['marca_pc'],
            's_n_pc' => $row ['s_n_pc'],
            'modelo' => $row ['modelo'],
            'procesador' => $row ['procesador'],
            'ram' => $row ['ram'],
            'tipo_ram' => $row ['tipo_ram'],
            'almacenamiento' => $row ['almacenamiento'],
            'tipo_disco' => $row ['tipo_disco'],
            'so' => $row ['so'],
            'licencia_so' => $row ['licencia_so'],
            'office_v' => $row ['office_v'],
            'licencia_office' => $row ['licencia_office'],
            'marca_mause' => $row ['marca_mause'],
            's_n_mouse' => $row ['s_n_mouse'],
            'modelo_muse' => $row ['modelo_muse'],
            'marca_teclado' => $row ['marca_teclado'],
            's_n_tecaldo' => $row ['s_n_tecaldo'],
            'modelo_teclado' => $row ['modelo_teclado'],
            'monitorMarca' => $row ['monitorMarca'],
            'monitorModelo' => $row ['monitorModelo'],
            'monitorSN' => $row ['monitorSN'],
            'nombre_pc' => $row['nombre_pc'],
            'nombre_oficna' => $row['nombre_oficna'],
            // ... otras columnas de la computadora que desees incluir
            'comentarios' => array(), // un array para almacenar los comentarios
            #'fecha' => $row['fecha'],
            #'nota_pc' => $row['nota_pc'],
            #'apodo_user' => $row['apodo_user'],
            
        );
    }

    // Agrega el comentario a la computadora correspondiente
    $computadorasConComentarios[$idComputadora]['comentarios'][] = array(
        'id_bitacora_pc' => $row['id_bitacira_pc'],
        'fecha' => $row['fecha'],
        'nota_pc' => $row['nota_pc'],
        'id_admin' => $row['id_admin'],
        'nombre_user' => $row['nombre_user'],
        // ... otras columnas del comentario que desees incluir
    );
}
 
//$resultJson = json_encode(array_values($computadorasConComentarios));
echo json_encode(array_values($computadorasConComentarios));

?>


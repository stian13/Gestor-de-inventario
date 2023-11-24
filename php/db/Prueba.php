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
            'code_invet' => ['code_invet'],
            'nameUser' => ['nameUser'],
            'tipo_pc' => ['tipo_pc'],
            'marca_pc' => ['marca_pc'],
            's_n_pc' => ['s_n_pc'],
            'modelo' => ['modelo'],
            'procesador' => ['procesador'],
            'ram' => ['ram'],
            'tipo_ram' => ['tipo_ram'],
            'almacenamiento' => ['almacenamiento'],
            'tipo_disco' => ['tipo_disco'],
            'so' => ['so'],
            'licencia_so' => ['licencia_so'],
            'office_v' => ['office_v'],
            'licencia_office' => ['licencia_office'],
            'marca_mause' => ['marca_mause'],
            's_n_mouse' => ['s_n_mouse'],
            'modelo_muse' => ['modelo_muse'],
            'marca_teclado' => ['marca_teclado'],
            's_n_tecaldo' => ['s_n_tecaldo'],
            'modelo_teclado' => ['modelo_teclado'],
            'monitorMarca' => ['monitorMarca'],
            'monitorModelo' => ['monitorModelo'],
            'monitorSN' => ['monitorSN'],
            'nombre_pc' => $row['nombre_pc'],
            'nombre_oficna' => $row['nombre_oficna'],
            // ... otras columnas de la computadora que desees incluir
            #'comentarios' => array(), // un array para almacenar los comentarios
            'fecha' => $row['fecha'],
            'nota_pc' => $row['nota_pc'],
            'apodo_user' => $row['apodo_user'],
            
        );
    }

    // Agrega el comentario a la computadora correspondiente
    $computadorasConComentarios[$idComputadora]['comentarios'][] = array(
        'id_bitacora_pc' => $row['id_bitacira_pc'],
        'fecha' => $row['fecha'],
        'nota_pc' => $row['nota_pc'],
        'id_admin' => $row['id_admin'],
        // ... otras columnas del comentario que desees incluir
    );
}

$resultJson = json_encode(array_values($computadorasConComentarios));
echo $resultJson;

?>
<?php
include ('./db.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializa un array para almacenar los datos del formulario
    $formData = array();

    // Recorre todos los elementos del formulario
    foreach ($_POST as $key => $value) {
        // Almacena el valor en el array usando el nombre del campo como clave
        $formData[$key] = $value;
    }
    #query id de la oficina
    $queryOficina = "SELECT * FROM `ofic` WHERE nombre_oficna = '$formData['oficina']'";
    $queryEjecut = $mysqli -> query($queryOficina);

    while ($row = mysqli_fetch_assoc($queryEjecut)){

        $idOfice = $row ['id_oficinas'];

        $updateQuery = "UPDATE `computadoras` SET 
                    `code_invet`='{$formData['invenCode']}',
                    `nombre_pc`='{$formData['namePc']}',
                    `nameUser`='{$formData['nombreUser']}',
                    `tipo_pc`='{$formData['tipo-computadora']}',
                    `marca_pc`='{$formData['marcaPC']}',
                    `s_n_pc`='{$formData['snpc']}',
                    `modelo`='{$formData['modeloPc']}',
                    `procesador`='{$formData['cpu']}',
                    `ram`='{$formData['ram']}',
                    `tipo_ram`='{$formData['tipoRam']}',
                    `almacenamiento`='{$formData['capacidadDisco']}',
                    `tipo_disco`='{$formData['tipoDisco']}',
                    `so`='{$formData['nameSO']}',
                    `licencia_so`='{$formData['sOLicencia']}',
                    `office_v`='{$formData['officeV']}',
                    `licencia_office`='{$formData['licenciaOffice']}',
                    `marca_mause`='{$formData['marcMouse']}',
                    `s_n_mouse`='{$formData['snMouse']}',
                    `modelo_muse`='{$formData['modeloMouse']}',
                    `marca_teclado`='{$formData['marcaTeclado']}',
                    `s_n_tecaldo`='{$formData['snTeclado']}',
                    `modelo_teclado`='{$formData['modeloTeclado']}',
                    `monitorMarca`='{$formData['marcaMonitor']}',
                    `monitorModelo`='{$formData['modeloMonitor']}',
                    `monitorSN`='{$formData['sNMonitor']}',
                    `id_ofice_pc`= $idOfice
                    WHERE id_computador = $formData['pcCode']";

                    $ecutQEdition = $mysqli -> query($updateQuery);
                    if ($ecutQEdition) {
                        echo json_encode("corregido correctamente")
                    }else {
                        echo json_encode("se produjo un error al modificar la informacion del pc")
                    }
    }
    
    // Muestra los datos del formulario usando echo
    
}
?>

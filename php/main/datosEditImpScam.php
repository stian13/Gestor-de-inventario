<?php
include ('../db/db.php');

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$error = array();

$invenCode = isset($_post['invenCode']) ? sanitize_input($_POST['invenCode']) : null;
$pcCode = isset($_POST['pcCode']) ? sanitize_input($_POST['pcCode']) : null;
$oficinaActual = isset($_POST['oficinaActual']) ? sanitize_input($_POST['oficinaActual']) : null;

$id_oficina_seleccionada = isset($_POST['idOfinaSeleccionada']) ? sanitize_input($_POST['idOfinaSeleccionada']) : null;
$tipo_pc = isset($_POST['tipoPc']) ? sanitize_input($_POST['tipoPc']) : null;
$marcaImpScamp = isset($_POST['marcaImpScan']) ? sanitize_input($_POST['marcaImpScan']) : null;
$modeloImpScan = isset($_POST['modeloImpScan']) ? sanitize_input($_POST['modeloImpScan']) : null;
$sNImpScan = isset($_POST['sNImpScan']) ? sanitize_input($_POST['sNImpScan']) : null;


$mostrar_info_actualizada = false;
if (!empty($errors)) {
    foreach($errors as $error) {
        echo "<p>Error : $error</p>";
    }
}else{
    $query_edition_ImpScam = "UPDATE `impresoras_scaners` SET `marca`='$marcaImpScamp',`nombre_modelo`='$modeloImpScan',`tipo_impresora`='$tipo_pc',`id_oficina_impre`='$id_oficina_seleccionada',`s_n_impresora`='$sNImpScan',`code_invent_int`='$invenCode' WHERE `id_imp_scan`= $pcCode";

    $ejecutar_Upgrade = $mysqli -> query ($query_edition_ImpScam);
    $mostrar_info_actualizada = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/stylesTablaComputadoras.css">
    <link rel="stylesheet" href="../../Styles/stylesDetallesDispositivos.css">
    <title>Actualizacion completada</title>
</head>
<body>
    <?php if ($mostrar_info_actualizada) { ?>
        <h2 class = "title-edit-info-pc">Edicion realizada satisfactoriamente</h1>

        <div class ="conten-form-edit-pc">
            <section class="info-dispostivo-section">
                <div class="code-dispositivo">
                    <h3 class="blue-title">Codigo Inventario</h3>
                    <p><?php echo $invenCode ?></p>
                </div>
                <div class="info-ubicacion">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Nombre Oficina</h4>
                        <p><?php echo $oficinaActual ?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Tipo</h4>
                        <p><?php echo $tipo_pc ?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <p><?php echo $marcaImpScamp ?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Modelo</h4>
                        <p><?php echo $modeloImpScan ?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">S/N Equipo</h4>
                        <p><?php echo $sNImpScan ?></p>
                    </div>
                </div>
                <button class = "style-btn editar-btn " id="back-table">volver a la tabla</button>
            </section>
        </div>
    <?php } ?>
</body>
<script>
        const volverALaTabla = document.querySelector('#back-table');
        volverALaTabla.addEventListener('click', (e) => {
            e.preventDefault();
            let randomNumber = Math.floor(Math.random() * 1000000);
            let irALaTabla = './TablaDescannerImpresora.php?random=' + randomNumber;
            window.location.href = irALaTabla;
        });
    </script>
</html>
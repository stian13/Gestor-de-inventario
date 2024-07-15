<?php
include ('../db/db.php');

$invenCode = $_POST['invenCode'];
$idOfinaSeleccionada = $_POST['idOfinaSeleccionada'];
$tipo_computadora = $_POST['tipo-computadora'];
$marcaImpScan = $_POST['marcaImpScan'];
$modeloImpScan = $_POST['modeloImpScan'];
$sNImpScan = $_POST['sNImpScan'];

$query_add_imp_scanner = "INSERT INTO `impresoras_scaners`(`marca`, `nombre_modelo`, `tipo_impresora`, `id_oficina_impre`, `s_n_impresora`, `code_invent_int`) VALUES ('$marcaImpScan', '$modeloImpScan', '$tipo_computadora', '$idOfinaSeleccionada', '$sNImpScan', '$invenCode')";

$se_ejecuto = ""; // Inicializando la variable

if ($mysqli->query($query_add_imp_scanner) === true) {
    $se_ejecuto = "seagrego";
} else {
    $se_ejecuto = "noseagrego: " . $mysqli->error; // Mostrar el error en caso de fallo
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
    <title>Nuevo Dispositivo</title>
</head>
<body>
<section class = "content--mensaje">
        <?php if ($se_ejecuto == "seagrego") {  ?>
            <div class = "mensaje">
                <h2>Se agrego un nuevo dispositvo</h2>
                <button class = "style-btn style-btn-blue" id = "return-table">Regresar a la tabla</button>
                <!--<button class = "style-btn style-btn-blue" id = "add-new-pc">Agregar nuevo PC</button>-->
            </div>
        <?php } else if ($se_ejecuto == "noseagrego"){ ?>
            <div>
                <h2>UPS algo salio mal, el dispositovo no pudo ser agregado</h2>
                <button class = "style-btn style-btn-red">Volver a intentar</button>
            </div>
        <?php } ?>
    </section>
</body>
<script>
    const returnTable = document.getElementById('return-table');
    const addNewPc = document.getElementById('add-new-pc');

    returnTable.addEventListener('click', (e) => {
        e.preventDefault();
        let randomNumber = Math.floor(Math.random() * 1000000);
        window.location.href = "./TablaDescannerImpresora.php" + '?random=' + randomNumber
    });

    addNewPc.addEventListener('click', (e) => {
        e.preventDefault();
        let randomNumber = Math.floor(Math.random() * 1000000);
        window.location.href = "./agragarImoScam" + '?random=' + randomNumber
    });
</script>
</html>
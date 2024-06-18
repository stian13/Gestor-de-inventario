<?php
include ('../db/db.php');

// Obtener datos del formulario
$invenCode = $_POST['invenCode'];
//$oficinaActual = $_POST['oficinaActual'];
$idOfinaSeleccionada = $_POST['idOfinaSeleccionada'];
$tipoPc = $_POST['tipo-computadora'];
$marcaPC = $_POST['marcaPC'];
$snpc = $_POST['snpc'];
$nombreUser = $_POST['nombreUser'];
$modeloPc = $_POST['modeloPc'];
$cpu = $_POST['cpu'];
$ram = $_POST['ram'];
$tipoRam = $_POST['tipoRam'];
$capacidadDisco = $_POST['capacidadDisco'];
$tipoDisco = $_POST['tipoDisco'];
$officeV = $_POST['officeV'];
$licenciaOffice = $_POST['licenciaOffice'];
$namePc = $_POST['namePc'];
$nameSO = $_POST['nameSO'];
$sOLicencia = $_POST['sOLicencia'];
$marcaMonitor = $_POST['marcaMonitor'];
$modeloMonitor = $_POST['modeloMonitor'];
$sNMonitor = $_POST['sNMonitor'];
$marcMouse = $_POST['marcMouse'];
$modeloMouse = $_POST['modeloMouse'];
$snMouse = $_POST['snMouse'];
$marcaTeclado = $_POST['marcaTeclado'];
$modeloTeclado = $_POST['modeloTeclado'];
$snTeclado = $_POST['snTeclado'];


$query_agregar_nuevo_pc = "INSERT INTO `computadoras`(`code_invet`, `nombre_pc`, `tipo_pc`, `marca_pc`, `s/n_pc`, `modelo`, `procesador`, `ram`, `tipo_ram`, `almacenamiento`, `tipo_disco`, `so`, `licencia_so`, `office_v`, `licencia_office`, `marca_mause`, `s/n_mouse`, `modelo_muse`, `marca_teclado`, `s/n_tecaldo`, `modelo_teclado`, `id_ofice_pc`, `marca_monitor`, `modelo_monitor`, `s/n_monitor`) VALUES ('$invenCode','$namePc','$tipoPc','$marcaPC','$snpc','$modeloPc','$cpu','$ram','$tipoRam','$capacidadDisco','$tipoDisco','$nameSO','$sOLicencia','$officeV','$licenciaOffice','$marcMouse','$snMouse','$modeloMouse','$marcaTeclado','$snTeclado','$modeloTeclado','$idOfinaSeleccionada', '$marcaMonitor', '$modeloMonitor', '$sNMonitor')";

#$ejecutar_consulta = $mysqli -> query($query_agregar_nuevo_pc);

$se_ejecuto;
if ($mysqli -> query($query_agregar_nuevo_pc) === true) {
    $se_ejecuto = "seagrego";
}else {
    $se_ejecuto = "noseagrego";
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
                <button class = "style-btn style-btn-blue" id = "add-new-pc">Agregar nuevo PC</button>
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
        window.location.href = "./TablaDeEquipos.php" + '?random=' + randomNumber
    });

    addNewPc.addEventListener('click', (e) => {
        e.preventDefault();
        let randomNumber = Math.floor(Math.random() * 1000000);
        window.location.href = "./agregarNewPc" + '?random=' + randomNumber
    });
</script>
</html>
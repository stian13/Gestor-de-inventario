<?php
include ('../db/db.php');

// Función para sanitizar datos
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Inicializar un array para almacenar errores
$errors = array();

// Obtener y sanitizar los datos del formulario
$id_pc = isset($_POST['invenCode']) ? sanitize_input($_POST['invenCode']) : null;
$pc_code = isset($_POST['pcCode']) ? sanitize_input($_POST['pcCode']) : null;
$oficina_actual = isset($_POST['oficinaActual']) ? sanitize_input($_POST['oficinaActual']) : null;
$id_oficina_seleccionada = isset($_POST['idOfinaSeleccionada']) ? sanitize_input($_POST['idOfinaSeleccionada']) : null;
$oficina = isset($_POST['oficina']) ? sanitize_input($_POST['oficina']) : null;
$tipo_pc = isset($_POST['tipoPc']) ? sanitize_input($_POST['tipoPc']) : null;
$tipo_computadora = isset($_POST['tipo-computadora']) ? sanitize_input($_POST['tipo-computadora']) : null;
$marca_pc = isset($_POST['marcaPC']) ? sanitize_input($_POST['marcaPC']) : null;
$sn_pc = isset($_POST['snpc']) ? sanitize_input($_POST['snpc']) : null;
$nombre_user = isset($_POST['nombreUser']) ? sanitize_input($_POST['nombreUser']) : null;
$modelo_pc = isset($_POST['modeloPc']) ? sanitize_input($_POST['modeloPc']) : null;
$cpu = isset($_POST['cpu']) ? sanitize_input($_POST['cpu']) : null;
$ram = isset($_POST['ram']) ? sanitize_input($_POST['ram']) : null;
$tipo_ram = isset($_POST['tipoRam']) ? sanitize_input($_POST['tipoRam']) : null;
$capacidad_disco = isset($_POST['capacidadDisco']) ? sanitize_input($_POST['capacidadDisco']) : null;
$tipo_disco = isset($_POST['tipoDisco']) ? sanitize_input($_POST['tipoDisco']) : null;
$version_office = isset($_POST['officeV']) ? sanitize_input($_POST['officeV']) : null;
$licencia_office = isset($_POST['licenciaOffice']) ? sanitize_input($_POST['licenciaOffice']) : null;
$nombre_pc = isset($_POST['namePc']) ? sanitize_input($_POST['namePc']) : null;
$name_so = isset($_POST['nameSO']) ? sanitize_input($_POST['nameSO']) : null;
$licencia_so = isset($_POST['sOLicencia']) ? sanitize_input($_POST['sOLicencia']) : null;
$marca_monitor = isset($_POST['marcaMonitor']) ? sanitize_input($_POST['marcaMonitor']) : null;
$modelo_monitor = isset($_POST['modeloMonitor']) ? sanitize_input($_POST['modeloMonitor']) : null;
$sn_monitor = isset($_POST['sNMonitor']) ? sanitize_input($_POST['sNMonitor']) : null;
$marca_mouse = isset($_POST['marcMouse']) ? sanitize_input($_POST['marcMouse']) : null;
$modelo_mouse = isset($_POST['modeloMouse']) ? sanitize_input($_POST['modeloMouse']) : null;
$sn_mouse = isset($_POST['snMouse']) ? sanitize_input($_POST['snMouse']) : null;
$marca_teclado = isset($_POST['marcaTeclado']) ? sanitize_input($_POST['marcaTeclado']) : null;
$modelo_teclado = isset($_POST['modeloTeclado']) ? sanitize_input($_POST['modeloTeclado']) : null;
$sn_teclado = isset($_POST['snTeclado']) ? sanitize_input($_POST['snTeclado']) : null;

// Validar los datos del formulario
if (empty($id_pc)) {
    $errors[] = "El código de inventario es obligatorio.";
}

// Puedes agregar más validaciones aquí según sea necesario
$mostrar_info_actualizada = false;
// Mostrar errores si hay
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>Error: $error</p>";
    }
} else {
    
    $query_edicion_pc = "UPDATE `computadoras` SET `nombre_pc`='$nombre_pc',`tipo_pc`='$tipo_pc',`marca_pc`='$marca_pc',`s/n_pc`='$sn_pc',`modelo`='$modelo_pc',`procesador`='$cpu',`ram`='$ram',`tipo_ram`='$tipo_ram',`almacenamiento`='$capacidad_disco',`tipo_disco`='$tipo_disco',`so`='$name_so',`licencia_so`='$licencia_so',`office_v`='$version_office',`licencia_office`='$licencia_office',`marca_mause`='$marca_mouse',`s/n_mouse`='$sn_mouse',`modelo_muse`='$modelo_mouse',`marca_teclado`='$marca_teclado',`s/n_tecaldo`='$sn_teclado',`modelo_teclado`='$modelo_teclado',`id_ofice_pc`='$oficina' WHERE `id_computador`= $pc_code";

    $ejecutar_Atualizacion = $mysqli -> query($query_edicion_pc);
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
            <!--Especificaciones generales-->
            <section class="info-dispostivo-section">
                <!--codigo-->
                <div class="code-dispositivo">
                    <h3 class="blue-title">Codigo Inventario</h3>
                    <p><?php echo $id_pc?></p>
                </div>
                <!--Carateristicas de ubicacion-->
                <div class="info-ubicacion">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Nombre de Oficina</h4>
                        <p><?php echo $oficina_actual?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Tipo</h4>
                        <p><?php echo $tipo_pc?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <p><?php echo $marca_pc?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title" >S/N</h4>
                        <p><?php echo $sn_pc?></p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Nombre de Usuario</h4>
                        <p><?php echo $nombre_user?></p>
                    </div>
                </div>
                <!--Caracteristicas Tecnicas-->
                <div class="especificaciones-tecnicas-content">
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title">Modelo</h4>
                        <p><?php echo $modelo_pc?></p>
                    </div>
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title" >Peocesador</h4>
                        <p><?php echo $cpu?></p>
                    </div>
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title" >Memoria RAM</h4>
                        <p><?php echo $ram?></p>

                        <h4 class="blue-title">Tipo</h4>
                        <p><?php echo $tipo_ram?></p>
                    </div>
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title">Almacenamiento</h4>
                        <p><?php echo $capacidad_disco?></p>

                        <h4 class="blue-title">Tipo</h4>
                        <p><?php echo $tipo_disco?></p>
                    </div>
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title">OFFICE VERSION</h4>
                        <p><?php echo $version_office?></p>

                        <h4 class="blue-title">licencia</h4>
                        <p><?php echo $licencia_office?></p>
                    </div>
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title">Nombre de Equipo</h4>
                        <p><?php echo $nombre_pc?></p>
                    </div>
                    <div class="info-tecnica-tex-div">
                        <h4 class="blue-title ">Sistema Operativo</h4>
                        <p><?php echo $name_so?></p>

                        <h4 class="blue-title">licencia</h4>
                        <p><?php echo $licencia_so?></p>
                    </div>
                </div>
                <hr class="linea-divisora">
                <!--Caracteristicas perifericos-->
                <div class="content-perifericos">
                    <h4 class="blue-title">Monitor</h4>
                    <div class="periferico">
                        <div class="tex-content-info">
                            <h4 class="blue-title">Marca</h4>
                            <p><?php echo $marca_monitor?></p>
                        </div>
                        <div class="tex-content-info"> 
                            <h4 class="blue-title">Modelo</h4>
                            <p><?php echo $modelo_monitor?></p>
                        </div>
                        <div class="tex-content-info">
                            <h4 class="blue-title">Codigo S/N</h4>
                            <p><?php echo $sn_monitor?></p>
                        </div>
                        
                    </div>
                </div>
                <hr class="linea-divisora">
                <div class="content-perifericos">
                    <h4 class="blue-title">Mouse</h4>
                    <div class="periferico">
                        <div class="tex-content-info">
                            <h4 class="blue-title">Marca</h4>
                            <p><?php echo $marca_mouse?></p>
                        </div>
                        <div class="tex-content-info">
                            <h4 class="blue-title">Modelo</h4>
                            <p><?php echo $modelo_mouse?></p>
                        </div>
                        <div class="tex-content-info">
                            <h4 class="blue-title">Codigo S/N</h4>
                            <p><?php echo $sn_mouse?></p>
                        </div>
                    </div>
                </div>
                <hr class="linea-divisora">
                <div class="content-perifericos">
                    <h4 class="blue-title">Teclado</h4>
                    <div class="periferico">
                        <div class="tex-content-info">
                            <h4 class="blue-title">Marca</h4>
                            <p><?php echo $marca_teclado?></p>
                        </div>
                        <div class="tex-content-info">
                            <h4 class="blue-title">Modelo</h4>
                            <p><?php echo $modelo_teclado?></p>
                        </div>
                        <div class="tex-content-info">
                            <h4 class="blue-title">Codigo S/N</h4>
                            <p><?php echo $sn_teclado?></p>
                        </div>
                    </div>
                </div>
                <button class = "style-btn editar-btn " id="back-table">volver a la tabla</button>
            </section>
        </div>
    <?php }?>
</body>
    <script>
        const volverALaTabla = document.querySelector('#back-table');
        volverALaTabla.addEventListener('click', (e) => {
            e.preventDefault();
            let randomNumber = Math.floor(Math.random() * 1000000);
            let irALaTabla = './TablaDeEquipos.php?random=' + randomNumber;
            window.location.href = irALaTabla;
        });
    </script>
</html>
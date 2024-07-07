<?php
include ('./db.php');
/*
$new_ofice = $_POST['New-Ofice'];
$query_add_ofice = "INSERT INTO `ofic`( `nombre_oficna`) VALUES ('$new_ofice')";
$ejcucion_query = $mysqli -> query ($query_add_ofice);*/

$new_ofice = $_POST['New-Ofice'];
//$new_ofice = filter_input(INPUT_POST, 'New-Ofice', FILTER_SANITIZE_STRING);
$mostrar_mensaje;
// Comprobar si se obtuvo un valor válido
if ($new_ofice) {
    // Preparar la consulta para prevenir inyecciones SQL
    $stmt = $mysqli->prepare("INSERT INTO `ofic` (`nombre_oficna`) VALUES (?)");
    
    if ($stmt) {
        // Enlazar el parámetro
        $stmt->bind_param('s', $new_ofice);
        
        // Ejecutar la consulta
        $execution_success = $stmt->execute();
        
        if ($execution_success) {
            $mostrar_mensaje = true;
        } else {
            $mostrar_mensaje = falso;
        }
        
        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqli->error;
    }
} else {
    echo "Entrada no válida";
}

// Cerrar la conexión
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/stylesTablaComputadoras.css">
    <link rel="stylesheet" href="../../Styles/stylesDetallesDispositivos.css">
    <title>OFICINA AGREGADA</title>
</head>
<body>
    <?php if($mostrar_mensaje) { ?>
        <section class = "content-msn-add-ofice">
            <div class = "msn-add-ofice">
                <h2>La oficina <span class = "ofice-add"><?php echo $new_ofice?></span> Fue agregada satisfactoriamente</h2>
                <button class = "style-btn add-note-btn" id = "btn-back">Regresar</button>
            </div>
        </section>
    <?php } else if ($mostrar_mensaje == false) {?>
        <section class = "content-msn-add-ofice">
            <div class = "msn-add-ofice">
                <h2>La solicitud no se pudo completar</h2>
                <button class = "style-btn add-note-btn" id = "btn-back">Regresar</button>
            </div>
        </section>
    <?php } ?>
    
</body>
<script>
    const btnBack = document.querySelector('#btn-back')
    btnBack.addEventListener('click', (e)=>{
        e.preventDefault();
        let randomNumber = Math.floor(Math.random() * 1000000);
        let irALaTabla = '../main/invetarioPestañaPrincipal.php?random=' + randomNumber;
        window.location.href = irALaTabla;
    })
</script>
</html>
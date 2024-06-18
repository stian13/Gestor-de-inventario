<?php
include ('../db/db.php');

$id_pc_eleminar = $_POST['idPcAEliminar'];
//echo "id del pc a eliminar: " . htmlspecialchars($id_pc_eleminar, ENT_QUOTES, 'UTF-8') . "<br>";

$query_Eliminar_Pc = "DELETE FROM computadoras WHERE `computadoras`.`id_computador` = ?";
$stmt = $mysqli->prepare($query_Eliminar_Pc);

$mostrar_mensaje = false;

if ($stmt) {
    $stmt->bind_param("i", $id_pc_eleminar);
    $result = $stmt->execute();

    if ($result) {
        $mostrar_mensaje = true;
        //echo "La computadora con ID $id_pc_eleminar fue eliminada exitosamente.";
    } else {
        //echo "Error al eliminar la computadora con ID $id_pc_eleminar: " . $stmt->error;
        $mostrar_mensaje = true;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/stylesTablaComputadoras.css">
    <link rel="stylesheet" href="../../Styles/stylesDetallesDispositivos.css">
    <title>Eliminacion de equipo completada</title>
</head>
<body>
    <?php if ($mostrar_mensaje) { ?>
        <section class="section-mensaje-eliminacion">
            <div>
                <h2>Se elimino el dispositovo satisfactoriamiente</h2>
                <button class="style-btn editar-btn" id="back-table">Regresar</button>
            </div>
        </section>
    <?php } else { ?>
        <section class="section-mensaje-eliminacion">
            <div>
                <h2>UPS! no pudimos completar tu solicitud😕</h2>
                <button class="style-btn editar-btn" id="back-table">intentar de nuevo</button>
            </div>
        </section>
    <?php } ?>
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

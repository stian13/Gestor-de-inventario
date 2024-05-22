<?php
include ('../db/db.php');

$id_pc_eleminar = $_POST['idPcAEliminar'];
echo "id del pc a eliminar: " . htmlspecialchars($id_pc_eleminar, ENT_QUOTES, 'UTF-8') . "<br>";

$query_Eliminar_Pc = "DELETE FROM computadoras WHERE `computadoras`.`id_computador` = ?";
$stmt = $mysqli->prepare($query_Eliminar_Pc);

$mostrar_mensaje = false;

if ($stmt) {
    $stmt->bind_param("i", $id_pc_eleminar);
    $result = $stmt->execute();

    if ($result) {
        echo "La computadora con ID $id_pc_eleminar fue eliminada exitosamente.";
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
    <title>Eliminacion de equipo completada</title>
</head>
<body>
    <?php if ($mostrar_mensaje) { ?>
        <h1>El equipo fue eleminado satisfactoriamente</h1>
    <?php } ?>
</body>
</html>

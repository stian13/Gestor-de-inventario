<?php

include('../db/db.php');
$se_cambio_contraseña = false;
// Verificar si se recibieron los datos del formulario
if(isset($_POST["elcorreo"], $_POST["newContraseña"])) {
    // Recibir y escapar los datos del formulario
    $correo = $mysqli->real_escape_string($_POST["elcorreo"]);
    $nueva_contraseña = $mysqli->real_escape_string($_POST["newContraseña"]);

    // Consulta SQL con sentencia preparada para seguridad contra inyección SQL
    $cambio_clave = $mysqli->prepare("UPDATE admin_tec SET `codigo_recuperacion`= NULL, `contrasena`=? WHERE correo = ?");
    $cambio_clave->bind_param("ss", $nueva_contraseña, $correo);

    // Ejecutar la consulta
    $ejecutar_cambio_clave = $cambio_clave->execute();

    // Verificar si la consulta se ejecutó correctamente y si se afectaron filas
    if ($ejecutar_cambio_clave && $mysqli->affected_rows > 0) {
        $se_cambio_contraseña = true;
    } else {
        $se_cambio_contraseña = false;
    }

    // Cerrar la sentencia preparada
    $cambio_clave->close();
} else {
    echo "No se recibieron todos los datos del formulario";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de contrasela EXITOSO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/stylesInicioSesion.css">
</head>
<body>
    <?php if ($se_cambio_contraseña) { ?>
        <section class="mensaje-cambio-contraseña">
            <div>
                <h1>Se cambio la contraseña satisfactoriamente</h1>
                <button onclick="window.location.href='../../html/sesioniniciar.html'" class="form-login__boton">Regresar</button>
            </div>
        </section>
    <?php } else { ?>
        <section class="mensaje-cambio-contraseña">
            <div>
                <h2>UPS ocurrio un erro en el cambio de contraseña</h2>
                <button class = "volverIntentar form-login__boton" onclick="window.location.href='./codigo_verificacion.php'">volver a intentar</button>
            </div>
        </section>
    <?php } ?>
    <!--<script src = "../../javascript/cambioContraseña.js"></script>!-->
</body>
</html>
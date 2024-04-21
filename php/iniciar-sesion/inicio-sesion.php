<?php
session_start();

// Verificar si la variable de sesión intentos no está definida
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}
$gasto_intentos = false;
$new_intento = false;
// Verificar si se ha excedido el límite de intentos
if ($_SESSION['intentos'] >= 5) {
    $gasto_intentos = true;
    session_unset(); // Limpiar todas las variables de sesión
    // Redireccionar a la página de recuperación de cuenta
    header("Location: recuperacion-cuenta.php");
    exit(); // Detener el script
}

//base de datos
include('../db/db.php');
//Usuario contraseña
$user_name = $_POST['nameUser'];
$password = $_POST['password'];

$_SESSION['usuario'] = $user_name;

//Verificacion de usuario y contraseña
$consulta_verificacion = "SELECT * FROM admin_tec WHERE apodo_user='$user_name' AND contrasena='$password'";
$result = $mysqli->query($consulta_verificacion);
$filas = mysqli_num_rows($result);

if ($filas > 0) {
    // Autenticación exitosa, redirigir a la página principal
    header("location:../main/invetarioPestañaPrincipal.php");
    exit();
} else {
    // Incrementar el contador de intentos
    $_SESSION['intentos']++;
    $new_intento = true;
}

mysqli_free_result($result);
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion De contraseña</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/stylesInicioSesion.css">
</head>
<body>
    <?php if ($gasto_intentos) { ?>
        <section class = "content-recuperar-cuenta">
        <div>
            <h2>Gastaste todos tus intentos.</h2>
            <button onclick="window.location.href='recuperacion-cuenta.php'" class="form-login__boton">Recuperar cuenta</button>
        </div>
    </section>
    <?php } ?>
    <?php if ($new_intento) { ?>
        <section class = "content-recuperar-cuenta">
            <div>
                <h2>Error de autenticación, volver a intentar.</h2>
                <button onclick="window.location.href='../../html/sesioniniciar.html'" class="form-login__boton">Volver al formulario</button>
                <button onclick="window.location.href='recuperacion-cuenta.php'" class="form-login__boton">Recuperar cuenta</button>
            </div>
        </section>
    <?php } ?>
</body>
</html>

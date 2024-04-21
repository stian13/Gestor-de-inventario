<?php
include('../db/db.php');
require('./enviarCorreo.php');

$code_verification;
$correo;
$nueva_contraseña;

$cambiar_clave_form = false;
$realizo_cambio_clave = false;

$code_verification = $_POST["codeVerification"];
$correo = $_POST["correoo"];

$c_verificacion = "SELECT * FROM admin_tec WHERE codigo_recuperacion ='$code_verification' and correo = '$correo' ";
$result = $mysqli->query($c_verificacion);
$filas = mysqli_num_rows($result);

if ($result && $result->num_rows > 0) {
    $cambiar_clave_form = true;
}

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
    <?php if ($cambiar_clave_form) { ?>
        <section class="form-cambio-contraseña">
            <form action="cambioContraseña.php" method = "post">
                <h2>Ingresa tu nueva contraseña</h2>
                <input type="email" name="elcorreo" id="correo" value="<?php echo $correo?>" readonly class="inactivo">
                <input type="password" name="newContraseña" id="" class="iput-general">
                <input type="submit" value="Actulizar" class="form-login__boton">
            </form>
        </section>
    <?php } else { ?>

        <h2>el codigo de verificacion es erroneo</h2>

    <?php } ?>
</body>
</html>

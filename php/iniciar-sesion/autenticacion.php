<?php
include('../db/db.php');
require('./enviarCorreo.php');

$correo = $_POST["correo"];
$c_verificacion = "SELECT * FROM admin_tec WHERE correo ='$correo'";
$result = $mysqli->query($c_verificacion);
$filas = mysqli_num_rows($result);


$codigo = mt_rand(1000, 9999);
$mostrar_mensaje = false;
//mostrar detalles de usuario

$name_user;
$apodo;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $correo_verificado = $row["correo"];

        //Envio de codigo 
        $query_code_recuperacion = "UPDATE `admin_tec` SET `codigo_recuperacion`= $codigo WHERE `correo` = '$correo_verificado'";
        $enviar = $mysqli->query($query_code_recuperacion);

        $mostrar_mensaje = true;
        $name_user = $row["nombre_user"];
        /*
        echo "<h2>Detalles del usuario:</h2>";
        echo "<p>Nombre de usuario: " . $row["apodo_user"] . "</p>";
        echo "<p>Apodo del usuario: " .  . "</p>";
        echo "<p>Correo electrónico: " . $correo_verificado . "</p>";
        echo "<p>Se envio un codigo de verificacion de usuario a tu correo, por favor revisa tu bandeja de entrada";*/
        // Aquí puedes mostrar más detalles del usuario si los necesitas
        $codeRecuperacion = $codigo;
        $asunto = "Recuperacion contraseña";
        $cuerpo = "<!DOCTYPE html>
        <html lang=\"Spanish\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <meta http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate, post-check=0, pre-check=0\">
            <meta http-equiv=\"Pragma\" content=\"no-cache\">
            <meta http-equiv=\"Expires\" content=\"0\">
            <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
            <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
            <link href=\"https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap\" rel=\"stylesheet\">            <style>
                html{
                    font-family: 'Kanit', sans-serif;
                }
                :root{
                    --grisFuerteFondo : #4F4F4F;
                    --blancoGrisaseo : #D9D9D9;
                    --azul : #341BCB;
                    --blanco: #FFFFFF;
                    --size-titulos : 26px;
                    --rojo : #ff0b0b;
                    --rojo-bajo : #F52E2E;
                }
                body {
                    background-color: var(--grisFuerteFondo);
                }
                .Contenedor-mensaje{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                .card-mensaje{
                    background-color: var(--blanco);
                    border-radius: 10px;
                }
                .titulo{
                    text-align: center;
                    color : blue;
                }
                .text-mensaje{
                    padding: 0 10px;
                }
                .text-mensaje {
                    
                }
                .saludo{
                    font-size : 30px;
                    color : red;
                }
                .firma {
                    display: flex;
                    gap: 20px;
                }
        
                .firma img{
                    width: 150px;
                }
            </style>
        </head>
            <body>
                <section class=\"Contenedor-mensaje\">
                    <div class=\"card-mensaje\">
                        <h2 class = \"titulo\">Recuperacion de contrase&ntilde;a</h2>
                        <div class=\"text-mensaje\">
                            <p class =\"saludo\">Hola,</p>
                            <p>Recibes este correo porque solicitaste restablecer tu contrase&ntilde;a.</p>
                            <p>Por favor, utiliza el siguiente codigo para completar el proceso de recuperacion:</p>
                            <div>$codeRecuperacion </div>
                            <p>Este codigo es valido por un tiempo limitado. No lo compartas con nadie.</p>
                            <p>Si no solicitaste restablecer tu contrase&ntilde;a, puedes ignorar este mensaje.</p>
                            <p>Gracias,</p>
                            <div class=\"firma\">
                                <img src=\"https://th.bing.com/th/id/R.91d2366f6c1b7d69a295f612a20f9ee0?rik=as%2bYt2EfZVxWgA&riu=http%3a%2f%2fwww.tecnocomprascr.com%2fwp-content%2fuploads%2f2014%2f06%2fsupport.png&ehk=AMrCnbiEXhYQevD2ILCiOpHx4yNOo3QDDyWeHU2HVhU%3d&risl=&pid=ImgRaw&r=0\">
                                <h1>El equipo de Soporte</p>
                            </div>              
                        </div>
                                        
                    </div>
                </section>
            </body>
        </html>
        ";

        $email = $row["correo"];
        $apodo = $row["apodo_user"];
        enviarCorreo($asunto, $cuerpo, $email, $apodo, true);
    }
} else {
    echo "<p>No se encontraron usuarios con ese correo electrónico.</p>";
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
    <?php if ($mostrar_mensaje){ ?>
        <section class="content-detalles-user">
        <div class="detalles-user">
            <h2>Detalles del usuario:</h2>
            <ul>
                <li>Nombre de usuario: 👉<?php echo $name_user ?>👈</li>
                <li>Apodo del usuario: 👉<?php echo $apodo ?>👈</li>
                <li>Correo electrónico: 👉<?php echo $correo_verificado ?>👈 </li>
                <li>Se envio un codigo de verificacion de usuario a tu correo, por favor revisa tu bandeja de entrada</li>
            </ul>  
        </div>
        <div class="from-code-verificacion">
            <form action="./codigo_verificacion.php" method = "post">
                <h2>Coloca tu codigo de virificacion aqui</h2>
                <input type="email" name="correoo" id="correo" value="<?php echo $correo_verificado ?>" readonly class="inactivo">
                <input type="num" name = "codeVerification" class="iput-general">
                <input type="submit" value="verificar" class="form-login__boton">
            </form>
        </div>
    </section>
    <?php } ?>
</body>
</html>
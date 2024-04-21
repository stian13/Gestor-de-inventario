<?php

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
    <div class="content-form-correo-recuperacion">
        <form action="./autenticacion.php" method="post" class="form-correo-recuperacion">
            <h1>Ingresa tu correo electronico para recupera tu usario y contraseña</h1>
            <input type="email" name="correo" id="" class="imputCorreoRecuperacion">
            <input type="submit" value="recuperar" id = "btn-send-email" class="form-login__boton">
        </form>
    </div>
    <script>
        const = btnSendEmail = document.querySelector("#btn-send-email");
        btnSendEmail.addEventListener("click", (e)=>{
            e.preventDefault();
            alert("has enviado tu correo XD")
        })
    </script>
</body>
</html>
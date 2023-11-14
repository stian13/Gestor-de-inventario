<?php

#conexion a la base de datos
$mysqli = new mysqli("localhost", "root", "", "inventario_sistemas");

# Variables de formulario
$nombre_completo = $_POST['full_name'];
$apodo = $_POST['nameUser'];
$correo = $_POST['correo'];
$contraseña = $_POST['password'];


# Query
$info_tabla_admin = "SELECT * FROM admin_tec WHERE apodo_user='$apodo' OR correo='$correo'";

$envio_info_query = "INSERT INTO `admin_tec`( `nombre_user`, `apodo_user`, `contrasena`, `correo`) VALUES ('$nombre_completo', '$apodo', '$contraseña', '$correo')";

#Ejecucion del cuery
$consulta_usuario = $mysqli->query($info_tabla_admin);

# Verificar si el usuario ya existe
if ($consulta_usuario->num_rows > 0) {
    echo json_encode('Existing-User');
} else {
    $mysqli->query($envio_info_query);
    echo json_encode('User-Aggregator');
}



?>

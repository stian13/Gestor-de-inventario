<?php
include '../db/db.pb';
#variables formularios
$nombre_completo = $_POST['full_name'];
$apodo = $_POST['nameUser'];
$correo = $_POST['correo'];
$contraseña = $_POST['password'];

#querys
$info_tabla_admin = "SELECT * FROM admin_tec";
#--- Funciones ---

#Verificacion de datos 


#envio de datos


if ($nombre_completo === '' || $apodo === '' || $contraseña === '' || $correo === '') {
    echo json_encode('llena todos los campos perra');
}else {
    echo json_encode('Bienbenido pedaso de mierda parlante <br> ' . $nombre_completo . '<br>' . $apodo . '<br>' . $correo . '<br>' . $contraseña );
}

?>
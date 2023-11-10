<?php
$mysqli = new mysqli("localhost", "root", "", "inventario_sistemas");

if ($mysqli->connect_errno) {
    echo "fallo la conexion" . $mysqli->connect_errno;
}else{
    echo "Conexion exitosa <br>";
}
$new_correo = "orlado@gmail.com";
$new_apodo_user = "orlandito";
$new_contrasena = "125";
$consulta_one = "SELECT * FROM admin_tec";

$resultado_consulta = $mysqli -> query($consulta_one);

if ($resultado_consulta -> num_rows > 0) {
    while ($row = $resultado_consulta->fetch_assoc()) {
        if ( $new_correo === $row['correo'] || $new_apodo_user === $row['apodo_user'] || $new_contrasena === $row['contrasena']) {
            echo "el usuario ya existe, intente con otros datos";
        }
    }
    echo "bienvenido";
}else{
    echo "La tabla no conteine informacion";
}


?>
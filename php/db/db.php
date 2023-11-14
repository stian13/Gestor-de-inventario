<?php
$mysqli = new mysqli("localhost", "root", "", "inventario_sistemas");


$info_tabla_admin = "SELECT * FROM admin_tec";
$consulta_usuario = $mysqli->query($info_tabla_admin);
$row = $consulta_usuario->fetch_assoc();
?>
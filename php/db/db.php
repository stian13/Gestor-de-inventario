<?php
$mysqli = new mysqli("localhost", "root", "", "inventario_sistemas");

if ($mysqli ->connect_error) {
    die ("Fallo la conexion a la base de datos " . $mysqli -> connect_error);
}
?>
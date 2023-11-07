<?php
$mysqli = new mysqli("localhost", "root", "", "inventario_sistemas");

if ($mysqli->connect_errno) {
    echo "fallo la conexion" . $mysqli->connect_errno;
}else{
    echo "Conexion exitosa <br>";
}

$consulta_one = "SELECT * FROM computadoras";

$resultado_consulta = $mysqli -> query($consulta_one);

while ($row = $resultado_consulta->fetch_assoc()) {
    echo $row['id_computador']."<br>";
    echo $row['code_invet']."<br>";
    echo $row['nombre_pc']."<br>";
    echo $row['tipo_pc']."<br>";
}

?>
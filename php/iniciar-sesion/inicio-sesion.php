<?php
include('../db/db.php');
$user_name = $_POST['nameUser'];
$password = $_POST['password'];

session_start();

$_SESSION['usuario'] = $user_name;

$consulta_verificacion = "SELECT * FROM admin_tec WHERE apodo_user='$user_name' AND contrasena='$password'";

$result = $mysqli->query($consulta_verificacion);
$filas = mysqli_num_rows($result);

if ($filas>0){
    header("location:../main/invetarioPestañaPrincipal.php");
}else{
    echo "error en la autenticacion";
mysqli_free_result($result);
mysqli_close($mysqli);
}
?>
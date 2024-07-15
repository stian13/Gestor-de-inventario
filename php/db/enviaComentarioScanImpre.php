<?php
include ('./db.php');
$apodo = $_POST['nameAdmin'];
$fecha = $_POST['fechaEscrito'];
$coment = $_POST['texto'];
$idpc = $_POST['idPcOmpu'];
#query envio de datos al pc
$queryAdmin = "SELECT * FROM `admin_tec` WHERE apodo_user = '$apodo'";

$resul = $mysqli -> query($queryAdmin);
while ($row = mysqli_fetch_assoc($resul)){
    $idUser = $row['id_admin_tec'];
    #$numEntero = intval($idUser);
    #$numIdPc = intval($idpc);
    $queryDataComent =  $queryDataComent = "INSERT INTO `bitacoras_impresoras`(`fecha`, `id_name_admin`, `parrafo`, `id_impre_scan`) VALUES ('$fecha','$idUser','$coment','$idpc')";
    $ejecutorQuery = $mysqli -> query($queryDataComent);
    
    if ($ejecutorQuery) {
        echo json_encode('<div class="card-note newNotecard">
        <h4>Nueva nota Agregada</h4>
        <div class="info-basic-nota">
            <h4 class="blue-title">'.$fecha.'</h4>
            <div>
                <p class="blue-title">Encargado del caso :</p>
                <p>'.$apodo.'</p>
            </div>
        </div>

        <p class="color-gris">'.
            $coment.   
        '</p>
    </div>
    <br>');
    } else {
        echo json_encode("error");
    }
}





?>
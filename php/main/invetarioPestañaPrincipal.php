<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    echo 'no existe este usuario';
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <title>Inicias Sesion</title>
    <link rel="stylesheet" href="../../Styles/stylePestañaPrincipal.css">
    <link rel="stylesheet" href="../../Styles/stylesDetallesDispositivos.css">
</head>
<body>
    <header>
        <section class="Container-cabecera">
            <div ><!--logo alcaldia-->
                <img src="../../Assets/Img/planeta-rica-escudo.png" alt="" class="img-alcaldia">
            </div>

                <h1>Sistema de inventarios</h1>

            <div><!--logo alcaldia-->
                <a href="../iniciar-sesion/close.php">
                    <img src="../../Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
                </a>
            </div>
        </section>
    </header>
    <main>
        <div class="container-menu-principal">
            <section class="container-menu-principal__card">
                <h3 class="titulo">Inventario de Computadoras</h3>
                <div class="conteiner-img-ver" id = "irTablePc">
                    <img src="../../Assets/Img/ordenador-personal (1).png" alt="" class="img-logo-tipo">
                </div>
            </section>
            <section class="container-menu-principal__card" id = "irTableImpScan">
                <h3 class="titulo">Inventario de impresoras</h3>
                <div class="conteiner-img-ver">
                    <img src="../../Assets/Img/impresora.png" alt="" class="img-logo-tipo">
                </div>
            </section>
        </div>

        <div class="boton-agregar">
            <div class="boton-agregar__lista-opciones">

                <div class = "add-ofice-form-conten desactivar" id = "conten-add-ofice">
                    <h3>Nombre de la oficina</h3>
                    <form action="../db/addOfice.php" method="post">
                        <input type="text" class = "stile-adda-ofice" name = "New-Ofice">
                        <input type="submit" value="Agregar" class = "style-btn editar-btn">
                    </form>
                </div>

                <button class = "btn-add-ofice" id = "add-ofice-btn">Agreagar Oficina</button>
            </div>
        </div>
            <!-- </div>
          
                <img src="../../Assets/Img/boton-agragar.png" alt=""class="boton-agregar__img-agragar">
            
            </div> -->
    </main>
    <script src="../../javascript/Function/variables.js"></script>
    <script src="../../javascript/redirecciones/redirecionar.js"></script>
    <script src="../../javascript/redirecciones/redirecTablaDispo.js"></script>
    <script src="../../javascript/Function/btnAddOfice.js"></script>
</body>
</html>
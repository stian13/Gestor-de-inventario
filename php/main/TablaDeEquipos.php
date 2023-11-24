<?php
session_start();

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
    <link rel="stylesheet" href="../../Styles/stylesTablaComputadoras.css">
    <link rel="stylesheet" href="../../Styles/stylesDetallesDispositivos.css">
    <title>Inventario de computadoras</title>
</head>
<body>
    
    <header class = "totalHeader">
        <section class="Container-cabecera">
            

                <h1>Inventario de computadoras</h1>

            <div ><!--logo alcaldia-->
                <a href="../iniciar-sesion/close.php">
                    <img src="../../Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
                </a>
            </div>
        </section>
    </header>

    <main class="contentPestañaTable">

        <section class="content-buscador-oficinas"> <!--buscador y oficinas-->
            <div class="content-oficinas">
                    <h3 class="titulo-mediano">Oficionas</h3>
                <div class="content-list-ofice">
                    <ul class="ulOfice">
                        
                    </ul>
                </div>
            </div>
            <div class="buscador">
                <form action="tu_script_de_búsqueda.php" method="GET">
                    <input type="text" name="q" placeholder="Buscar..." class="buscador__input">
                    <button type="submit" class="buscador__boton">
                        <img src="../../Assets/Img/lupa (1).png" alt="Buscar" class="buscador__lupa-img">
                    </button>
                </form>
            </div>
        </section>

        <section class="Container-table-data">
            <h3 class="titulo-mediano margin-izda">Todos los equipos</h3><!--TABLA DE CARACTERISTICAS-->

            <div class="cabecara-table-data">
                <div class="cabecara-table-data__list-name">
                    <div class="name-list">Oficina</div>
                    <div class="name-list">Usuario</div>
                    <div class="name-list">code_inve</div>
                    <div class="name-list">Tipo</div>
                    <div class="name-list">Procesador</div>
                    <div class="name-list">Almacenamiento</div>
                    <div class="name-list">Ram</div>
                </div>
            </div>

            <div class="container-data-especificaciones">
                <div class="contenido-tabla">
    
                    <!--<div class="cabecara-table-data"> -TABLA DE CARACTERISTICAS
                    <div class="cabecara-table-data__list-name especificaciones">
                            <div class="name-list">Salud</div>
                            <div class="name-list">Camilo santos</div>
                            <div class="name-list">001</div>
                            <div class="name-list">portatil</div>
                            <div class="name-list">ryzen 5 5600x</div>
                            <div class="name-list">500 GB</div>
                            <div class="name-list">16 GB</div>
                        </div>
                    </div>-->
                    
                </div>
            </div>
        </section>
        <!--Boton de agregar-->
        <button class="agregar-equipo">Agregar equipo</button>
    </main>

    <!--Seccion donde se miestra los la ingormacion del equipo seleccionado!-->

    <header class="infoPcCase desactivar">
        <section class="Container-cabecera">
            <div class = "regresarTablePc"><!--logo alcaldia-->
                <img src="../../Assets/Img/flecha-izquierda.png" alt="" class="img-volver">
            </div>

                <h1>Caractaristicas de computadora</h1>

            <div>
                <a href="../iniciar-sesion/close.php">
                    <img src="../../Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
                </a>
            </div>
        </section>
    </header>

    <main class="main-info-dispositivo">
        
        <!--Centro de notas-->
        
        
    </main>
    <form class="section-notes meterNota desactivar" action="../db/enviaComentario.php" method="post">
            <h2 class="color-blanco">Notas</h2>
            <div class="card-note">
                <div class="info-basic-nota">
                    <input type="date" class="fechaAuto" readonly name = "fechaEscrito">
                    <div>
                        <p class="blue-title">Encargado del caso :</p>
                        <input type="text" class="apodoUser" name = "nameAdmin" value="<?= $_SESSION['usuario'] ?>" readonly>
                    </div>
                </div>

                <textarea class="color-gris parrafo-note"  rows="4" name = "texto"></textarea>
            </div>
            <section class="section-btn-edition">
                <input type="submit" class="style-btn editar-btn" value="Guardar">
            </section>
    </form>
    <script src = "../../javascript/Function/variables.js"></script>
    <script src = "../../javascript/Function/funtionArrays.js"></script>
    <script src = "../../javascript/dataDbPhp/dataPc.js"></script>
    
</body>
</html>
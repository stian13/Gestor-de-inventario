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
    <title>Inventario de computadoras</title>
</head>
<body>
    <header>
        <section class="Container-cabecera">
            <div ><!--logo alcaldia-->
                <img src="./Assets/Img/flecha-izquierda.png" alt="" class="img-volver">
            </div>

                <h1>Inventario de Impresoras y Scanner</h1>

            <div><!--logo alcaldia-->
                <img src="./Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
            </div>
        </section>
    </header>

    <main>

        <section class="content-buscador-oficinas"> <!--buscador y oficinas-->
            <div class="content-oficinas">
                    <h3 class="titulo-mediano">Oficionas</h3>
                <div class="content-list-ofice">
                    <ul>
                        <li>Oficiona tal</li>
                        <li>Oficiona tal</li>
                        <li>Oficiona tal</li>
                        <li>Oficiona tal</li>
                        <li>Oficiona tal</li>
                        <li>Oficiona tal</li>
                        <li>Oficiona tal</li>
                    </ul>
                </div>
            </div>
            <div class="buscador">
                <form action="tu_script_de_búsqueda.php" method="GET">
                    <input type="text" name="q" placeholder="Buscar..." class="buscador__input">
                    <button type="submit" class="buscador__boton">
                        <img src="/Assets/Img/lupa (1).png" alt="Buscar" class="buscador__lupa-img">
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
                    <div class="name-list">Marca</div>
                    <div class="name-list">modelo</div>
                    <div class="name-list">S/N Equipo</div>
                </div>
            </div>
            <div class="container-data-especificaciones">
                <div class="contenido-tabla">
    
                    <div class="cabecara-table-data"> <!--TABLA DE CARACTERISTICAS-->
                        <div class="cabecara-table-data__list-name especificaciones">
                            <div class="name-list">Salud</div>
                            <div class="name-list">Camilo santos</div>
                            <div class="name-list">001</div>
                            <div class="name-list">Sacanner</div>
                            <div class="name-list">HP</div>
                            <div class="name-list">HP Jept laser jpjh55</div>
                            <div class="name-list">12238857810</div>
                        </div>
                    </div>
                    <div class="cabecara-table-data"> <!--TABLA DE CARACTERISTICAS-->
                        <div class="cabecara-table-data__list-name especificaciones">
                            <div class="name-list">Salud</div>
                            <div class="name-list">Camilo santos</div>
                            <div class="name-list">001</div>
                            <div class="name-list">Sacanner</div>
                            <div class="name-list">HP</div>
                            <div class="name-list">HP Jept laser jpjh55</div>
                            <div class="name-list">12238857810</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Boton de agregar-->
        <button class="agregar-equipo">Agregar equipo</button>
    </main>
</body>
</html>
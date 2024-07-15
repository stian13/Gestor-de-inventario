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
            <h1>Inventario de Impresoras y Scanner</h1>
            <div ><!--logo alcaldia-->
                <a href="../iniciar-sesion/close.php">
                    <img src="../../Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
                </a>
            </div>
        </section>
    </header>

    <div class = "btnControlTablePc">
        <div class = "backMenu">
            <img src="../../Assets/Img/flecha-izquierda.png" alt="" class="img-volver">
        </div>
        <div class = "reloadTablaPc">
            <img src="../../Assets/Img/recargar.png" alt="" class="img-volver">
        </div>
    </div>

    <main class="contentPestañaTable">
        <section class="content-buscador-oficinas"> <!--buscador y oficinas-->
                <div class="content-oficinas">
                        <h3 class="titulo-mediano">Oficionas</h3>
                    <div class="content-list-ofice">
                        <ul class="ulOfice">
                            
                        </ul>
                    </div>
                </div>
                <!---<div class="buscador">
                    <form action="tu_script_de_búsqueda.php" method="GET">
                        <input type="text" name="q" placeholder="Buscar..." class="buscador__input">
                        <button type="submit" class="buscador__boton">
                            <img src="../../Assets/Img/lupa (1).png" alt="Buscar" class="buscador__lupa-img">
                        </button>
                    </form>
                </div>!-->
            </section>

        <section class="Container-table-data">
            <h3 class="titulo-mediano margin-izda">Todos los equipos</h3><!--TABLA DE CARACTERISTICAS-->

            <div class="cabecara-table-data">
                <div class="cabecara-table-data__list-name">
                    <div class="name-list">Oficina</div>
                    <div class="name-list">code_inve</div>
                    <div class="name-list">Tipo</div>
                    <div class="name-list">Marca</div>
                    <div class="name-list">modelo</div>
                    <div class="name-list">S/N Equipo</div>
                </div>
            </div>
            <div class="container-data-especificaciones">
                <div class="contenido-tabla">
    
                    <!--
                        <div class="cabecara-table-data__list-name especificaciones">
                            <div class="name-list">Salud</div>
                            <div class="name-list">001</div>
                            <div class="name-list">Sacanner</div>
                            <div class="name-list">HP</div>
                            <div class="name-list">HP Jept laser jpjh55</div>
                            <div class="name-list">12238857810</div>
                        </div>
                    </div>
                    -->
                    
                </div>
            </div>
        </section>
        <!--Boton de agregar-->
        <button class="agregar-equipo" id = "btnAgregar">Agregar equipo</button>
    </main>

    <!--Secion de mostrar informacion del dispositivo-->

    <header class="infoPcCase desactivar">
        <section class="Container-cabecera">
            <div class = "regresarTablePc"><!--logo alcaldia-->
                <img src="../../Assets/Img/flecha-izquierda.png" alt="" class="img-volver">
            </div>
                <h1>Caractaristicas del equipo</h1>
            <div>
                <a href="../iniciar-sesion/close.php">
                    <img src="../../Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
                </a>
            </div>
        </section>
    </header>

    <!--Caracteristicas del equipo-->

    <main class="main-info-dispositivo">
        
        <!--Centro de notas-->
        
        
    </main>

    <section class="section-btn-edition desactivar" id = "btnEdition">
        <div class="style-btn editar-btn editInfoPc" id = "editInfoPc">Editar</div>
        <div class="style-btn borra-btn" id = "btnEliminar">Borrar</div>
    </section>

    <!--secion donde se borra el equipo-->
    <div class = "eliminar-equipo ">
        <form action="./eliminarImpScan.php" method="post" class="desactivar" id = "formEliminarPc">
            <h2>¿Seguro que deseas ELIMINAR ESTE EQUIPO?</h2>
            <input type="num" class = "desactivar" class = "idPcEliminar" id ="idPcEleminar" name = "idPcAEliminar">
            <div>
                <input type="submit" value="ELIMINAR" class = "style-btn borra-btn" >
                <button class = "style-btn editar-btn" id = "cancelarEliminacion">CANCELAR</button>
            </div>
        </form>
    </div>

    <section id = "sectorEditInfoPc">

    </section>

    <form class="section-notes meterNota desactivar" action="../db/enviaComentarioScanImpre.php" method="post">
            <h2 class="color-blanco">Notas</h2>
            <div class="card-note">
                <div class="info-basic-nota">
                    <input type="date" class="fechaAuto" readonly name = "fechaEscrito">
                    <div>
                        <p class="blue-title">Encargado del caso :</p>
                        <input type="text" class="apodoUser" name = "nameAdmin" value="<?= $_SESSION['usuario'] ?>" readonly>

                        <input type="text" class="idCompu desactivar" name = "idPcOmpu">
                    </div>
                </div>

                <textarea class="color-gris parrafo-note"  rows="4" name = "texto"></textarea>
            </div>
            <section class="section-btn-edition">
                <input type="submit" class="style-btn editar-btn" value="Guardar">
            </section>
    </form>

    <section class = "newNota">

    </section>

    <div class = "conten-form-edit-pc">
        <form class="main-info-dispositivo desactivar" action="./datosEditImpScam.php" method="post" id = "formEditionPc">
            <section class="info-dispostivo-section">
                <!--codigo-->
                <div class="code-dispositivo">
                    <label class="blue-title">Codigo Inventario</label>
                    <input type="number"  class="style-input-general" id = "invenCd" name = "invenCode">
                    <input type="number"  class="style-input-general desactivar" id = "idPrincipalDispositivo" name = "pcCode">
                </div>
                <div class="info-ubicacion">

                    <div class="tex-content-info">
                        <h4 class="blue-title" for="tipo-computadora" >Nombre de Oficina</h4>
                        <input type="text" id="oficinaActual" class="style-input-general" name = "oficinaActual">
                        <input type="text" id="idOficeSelec" class="style-input-general desactivar" name = "idOfinaSeleccionada">
                        <select id="listOficinas" name="oficina" class="style-input-list">
                            
                        </select>
                    </div>

                    <div class="tex-content-info">
                        <h4 class="blue-title">Tipo</h4>
                        <input type="text" id="tipoPcActual" class="style-input-general" name = "tipoPc">
                        <select id="tipoimpScan" name="tipo-computadora" class="style-input-list">
                            <option value="scarnner">scarnner</option>
                            <option value="Impresora">Impresora</option>
                            <option value="Escaner-impresora">Escaner-impresora</option>
                        </select>
                    </div>
    
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <input type="text" name="marcaImpScan" id="marcaImpScan" class="style-input-general">
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Modelo</h4>
                        <input type="text" name="modeloImpScan" id="modeloImpScan" class="style-input-general">
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">S/N Equipo</h4>
                        <input type="text" name="sNImpScan" id="sNImpScan" class="style-input-general">
                    </div>
                </div>
                <input type="submit" value="jecutar" class="style-btn editar-btn">
            </section>
        </form>
    </div>

    <!--
    <header class="infoPcCase desactivar">
        <section class="Container-cabecera">
            <div class = "regresarTablePc">
                <img src="../../Assets/Img/flecha-izquierda.png" alt="" class="img-volver">
            </div>

                <h1>Caractaristicas de computadora</h1>

            <div>
                <a href="../iniciar-sesion/close.php">
                    <img src="../../Assets/Img/cerrar-sesion.png" alt="" class="img-salir">
                </a>
            </div>
        </section>
    </header>-->

</body>
    <script src = "../../javascript/Function/location.js"></script>
    <script src = "../../javascript/Function/variables.js"></script>
    <script src = "../../javascript/Function/consultas.js"></script>
    <script src = "../../javascript/Function/funtionArrays.js"></script>
    <script src = "../../javascript/dataDbPhp/dataPc.js"></script>
</html>
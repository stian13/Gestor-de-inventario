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
    <div class = "btnControlTablePc">
        <div class = "backMenu"><!--logo alcaldia-->
            <img src="../../Assets/Img/flecha-izquierda.png" alt="" class="img-volver">
        </div>
        <div class = "reloadTablaPc"><!--logo alcaldia-->
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
    <section class="section-btn-edition desactivar" id = "btnEdition">
        <div class="style-btn editar-btn editInfoPc" id = "editInfoPc">Editar</div>
        <div class="style-btn borra-btn">Borrar</div>
    </section>
    <section id = "sectorEditInfoPc">

    </section>
    <form class="section-notes meterNota desactivar" action="../db/enviaComentario.php" method="post">
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

    <!---Seccion de edicion de datos de computadora!-->

    <form class="info-dispostivo-section desactivar"  method="post" id = "formEditionPc">
            <!--codigo-->
            <div class="code-dispositivo">
                <label class="blue-title">Codigo Inventario</label>
                <input type="number"  class="style-input-general" id = "invenCd" name = "invenCode">
                <input type="number"  class="style-input-general desactivar" id = "pcCd" name = "pcCode">
            </div>
            <!--Carateristicas de ubicacion-->
            <div class="info-ubicacion">
                <div class="tex-content-info">
                    <h4 class="blue-title" for="tipo-computadora" >Nombre de Oficina</h4>
                    <select id="listOficinas" name="oficina">
                        
                    </select>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Tipo</h4>
                    <select id="tipoComputadora" name="tipo-computadora">
                        <option value="pc-escritorio">PC de escritorio</option>
                        <option value="todo-en-uno">Todo en uno</option>
                        <option value="portatil">Portátil</option>
                    </select>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Marca</h4>
                    <input type="text" id="pcMarca" class="style-input-general" name="marcaPC">
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title" >S/N</h4>
                    <input type="text" id="pcSn" class="style-input-general" name ="snpc">
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Nombre de Usuario</h4>
                    <input type="text" id="nameUsuario" class="style-input-general" name="nombreUser">
                </div>
            </div>
            <!--Caracteristicas Tecnicas-->
            <div class="especificaciones-tecnicas-content">
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">Modelo</h4>
                    <input type="text" id="pcModel" class="style-input-general" name ="modeloPc">
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title" >Peocesador</h4>
                    <input type="text"  id="CPU" class="style-input-general" name ="cpu">
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title" >Memoria RAM</h4>
                    <input type="text"  id="memoryRam" class="style-input-general" name ="ram">

                    <h4 class="blue-title">Tipo</h4>
                    <select id="ramTipo" name="tipoRam">
                        <option value="DIM">DIM</option>
                        <option value="DDR1">DDR1</option>
                        <option value="DDR2">DDR2</option>
                        <option value="DDR3">DDR3</option>
                        <option value="DDR4">DDR4</option>
                        <option value="Desconocido">Desconocido</option>
                    </select>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">Almacenamiento</h4>
                    <input type="text"  id="almacenDisco" class="style-input-general" name = "capacidadDisco">

                    <h4 class="blue-title">Tipo</h4>
                    <select id="diskType" name="tipoDisco">
                        <option value="SSD">SSD</option>
                        <option value="HDD">HDD</option>
                    </select>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">OFFICE VERSION</h4>
                    <input type="text" id="versionOffice" class="style-input-general" name ="officeV">


                    <h4 class="blue-title">licencia</h4>
                    <input type="text"  id="licenseOffice" class="style-input-general" name ="licenciaOffice"> 

                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">Nombre de Equipo</h4>
                    <input type="text"  id="pcName" class="style-input-general" name ="namePc">

                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title ">Sistema Operativo</h4>
                    <input type="text"  id="so" class="style-input-general" name = "nameSO">


                    <h4 class="blue-title">licencia</h4>
                    <input type="text"  id="lisenceSO" class="style-input-general" name = "sOLicencia">

                </div>
            </div>
            <hr class="linea-divisora">
            <!--Caracteristicas perifericos-->
            <div class="content-perifericos">
                <h4 class="blue-title">Monitor</h4>
                <div class="periferico">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <input type="text" name="marcaMonitor" id="monitorMarca" class="style-input-general">

                    </div>
                    <div class="tex-content-info"> 
                        <h4 class="blue-title">Modelo</h4>
                        <input type="text" name="modeloMonitor" id="modelMonitor" class="style-input-general">

                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Codigo S/N</h4>
                        <input type="text" name="sNMonitor" id="monitorSn" class="style-input-general">

                    </div>
                    
                </div>
            </div>
            <hr class="linea-divisora">
            <div class="content-perifericos">
                <h4 class="blue-title">Mouse</h4>
                <div class="periferico">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <input type="text" name="marcMouse" id="marcaMause" class="style-input-general">

                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Modelo</h4>
                        <input type="text" name="modeloMouse" id="modelMouse" class="style-input-general">

                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Codigo S/N</h4>
                        <input type="text" name="snMouse" id="mouseSn" class="style-input-general">

                    </div>
                </div>
            </div>
            <hr class="linea-divisora">
            <div class="content-perifericos">
                <h4 class="blue-title">Teclado</h4>
                <div class="periferico">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <input type="text" name="marcaTeclado" id="keyboardMarca" class="style-input-general">

                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Modelo</h4>
                        <input type="text" name="modeloTeclado" id="keyboardModelo" class="style-input-general">

                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Codigo S/N</h4>
                        <input type="text" name="snTeclado" id="keyboardSN" class="style-input-general">

                    </div>
                </div>
            </div>
            <input type="submit" value="jecutar">
        </form>

    <script src = "../../javascript/Function/variables.js"></script>
    <script src = "../../javascript/Function/funtionArrays.js"></script>
    <script src = "../../javascript/dataDbPhp/dataPc.js"></script>
    
</body>
</html>
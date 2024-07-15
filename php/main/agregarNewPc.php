<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/stylesTablaComputadoras.css">
    <link rel="stylesheet" href="../../Styles/stylesDetallesDispositivos.css">
    <title>Agregar nuevo equipo PC</title>
</head>
<body>
<div class = "conten-form-edit-pc">
        <form class="info-dispostivo-section" action="./dbNewpc.php" method="post" id = "formEditionPc">
            <!--codigo-->
            <div class="code-dispositivo">
                <label class="blue-title">Codigo Inventario</label>
                <input type="number"  class="style-input-general" id = "invenCd" name = "invenCode">
            </div>
            <!--Carateristicas de ubicacion-->
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
                    <select id="tipoComputadora" name="tipo-computadora" class="style-input-general">
                        <option value=""></option>
                        <option value="pc-escritorio">PC ESCRITORIO</option>
                        <option value="todo-en-uno">TODO EN UNO</option>
                        <option value="portatil">PORTATIL</option>
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
                    <select id="ramTipo" name="tipoRam" class="style-input-general">
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
                    <select id="diskType" name="tipoDisco" class="style-input-general">
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
            <input type="submit" value="Guardar" class="style-btn editar-btn">
        </form>
    </div>
</body>
    <script src = "../../javascript/Function/variables.js"></script>
    <script src = "../../javascript/Function/consultas.js"></script>
    <script src = "../../javascript/Function/funtionArrays.js"></script>
    <script src = "../../javascript/Function/agreagEquipoPc.js"></script>
</html>
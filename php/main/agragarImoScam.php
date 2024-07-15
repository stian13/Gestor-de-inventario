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
    <title>Agregar Nuevo equipo</title>
</head>
<body>
<div class = "conten-form-edit-pc">
        <form class="main-info-dispositivo" action="./addNewEquipo.php" method="post" id = "formEditionPc">
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
                    <select id="tipoComputadora" name="tipo-computadora" class="style-input-general">
                        <option value=""></option>
                        <option value="Impresora"> IMPRESORA</option>
                        <option value="Scanner">SCANNER</option>
                        <option value="SCANNER-IMPRESORA">SCANNER-IMPRESORA</option>
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
</body>
    <script src = "../../javascript/Function/variables.js"></script>
    <script src = "../../javascript/Function/consultas.js"></script>
    <script src = "../../javascript/Function/funtionArrays.js"></script>
    <script src = "../../javascript/Function/agreagEquipoPc.js"></script>
</html>
const urlPc = "http://localhost/Gestor-de-inventario/php/main/TablaDeEquipos.php" 
const urlImpresora = "http://localhost/Gestor-de-inventario/php/main/TablaDescannerImpresora.php"
let url = window.location.href;
let cleanUrl = url.split('?')[0];
let mostrarInfoPcOrImpresora;
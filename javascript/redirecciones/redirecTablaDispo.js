//variables de los botones de redirecciones
const irTablePc = document.querySelector('#irTablePc');
const irTableImpScan = document.querySelector('#irTableImpScan');

//invocacion de funcion de redireccion y escuchar eventos

irTablePc.addEventListener('click', (e)=>{
    e.preventDefault(e);
    redireccion('./TablaDeEquipos.php?nocache=' + Math.random())
})
irTableImpScan.addEventListener('click', (e)=>{
    e.preventDefault(e);
    redireccion('./TablaDescannerImpresora.php?nocache=' + Math.random())
})
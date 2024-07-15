class octenedorDatos {
    constructor ({
        ubicacion
    }){
        this.ubicacion;
    }
    llamdo(){
        fetch(this.ubicacion)
            .then(response => response.json())
            .then(data => {
                // Aquí 'data' contendrá los datos del resultado de la consulta
                console.log(data);
                imprecioDataPc(data)
        })
    }
}



function llamadoDataPhp (ubicacion, tipoFuntion, comoVa){
    fetch(ubicacion)
    .then(response => response.json())
    .then(data => {
        // Aquí 'data' contendrá los datos del resultado de la consulta
            if (tipoFuntion === 'tablePc') {
                imprecioDataPc(data, comova)
            }else if(tipoFuntion === 'tableOficina'){
                imprecioDataOficina(data)
            }else if (tipoFuntion === 'tablePcFiltrado'){
                imprecioDataPc(data, comoVa)
            }
        })
}
if (cleanUrl === urlPc) {
    mostrarInfoPcOrImpresora = "pc"
    llamadoDataPhp('../../php/db/dataTablePc.php', 'tablePc')
}else if (cleanUrl === urlImpresora){
    mostrarInfoPcOrImpresora = "impresora"
    llamadoDataPhp('../../php/db/dataTableImpresora.php', 'tablePc')
}
//llamadoDataPhp('../../php/db/dataOficina.php', 'tableOficina')


 




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



function llamadoDataPhp (ubicacion, tipoFuntion){
    fetch(ubicacion)
    .then(response => response.json())
    .then(data => {
        // Aquí 'data' contendrá los datos del resultado de la consulta
            if (tipoFuntion === 'tablePc') {
                imprecioDataPc(data, comova)
            }else if(tipoFuntion === 'tableOficina'){
                imprecioDataOficina(data)
            } 
        })
}

llamadoDataPhp('../../php/db/dataTablePc.php', 'tablePc')
llamadoDataPhp('../../php/db/dataOficina.php', 'tableOficina')



let comova = "";

function llamadoDataPhpNew (ubicacion, tipoFuntion, cuaal, primerOfi){
    fetch(ubicacion)
    .then(response => response.json())
    .then(data => {
        // Aquí 'data' contendrá los datos del resultado de la consulta
            if (tipoFuntion === 'tablePc') {
                //imprecioDataPc(data, cuaal)
            }else if(tipoFuntion === 'funcionAllOficinas'){
                imprecioDataOficina(data, cuaal, primerOfi)
            }else if (tipoFuntion === 'soloTreaOficinas'){
                colocadorDeOficina(data, oficina)
            }else if (tipoFuntion == "addInfo"){
                console.log();
            }
        })
}
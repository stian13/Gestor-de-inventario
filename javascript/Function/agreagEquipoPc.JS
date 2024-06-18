fetch('../../php/db/dataOficina.php')
    .then(response => response.json())
    .then(data => {
            console.log(data);
            colocadorDeOficina(data, oficina)
        })

//lista de equipos tipoPcActual
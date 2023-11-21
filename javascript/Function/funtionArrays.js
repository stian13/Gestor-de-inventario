
class dispositivoPc {
    constructor({
        idComputador, codeInvet, nombrePc, nameUser, tipoPc, marcaPc, sNPc, modelo, procesador, ram, tipoRam, almacenamiento, tipoDisco, so, licenciaSo, officev, licenciaOffice, marcaMause, sNMouse, modeloMuse, marcaTeclado, sNTecaldo, modeloTeclado, monitorMarca, monitorModelo, monitorSN, nombreOficna, idOficePc
    }){
        this.idComputador = idComputador;
        this.codeInvet = codeInvet;
        this.nombrePc = nombrePc;
        this.nameUser = nameUser;
        this.tipoPc = tipoPc;
        this.marcaPc = marcaPc;
        this.sNPc = sNPc;
        this.modelo = modelo;
        this.procesador = procesador;
        this.ram = ram;
        this.tipoRam = tipoRam;
        this.almacenamiento = almacenamiento;
        this.tipoDisco = tipoDisco;
        this.so = so;
        this.licenciaSo = licenciaSo;
        this.officev = officev;
        this.licenciaOffice = licenciaOffice;
        this.marcaMause = marcaMause;
        this.sNMouse = sNMouse;
        this.modeloMuse = modeloMuse;
        this.marcaTeclado = marcaTeclado;
        this.sNTecaldo = sNTecaldo;
        this.modeloTeclado = modeloTeclado;
        this.monitorMarca = monitorMarca,
        this.monitorModelo = monitorModelo,
        this.monitorSn = monitorSN,
        this.nameOfi = nombreOficna,
        this.idOficePc = idOficePc;
    }
}
let comova = "";
function llamadoDataPhpNew (ubicacion, tipoFuntion, cuaal){
    fetch(ubicacion)
    .then(response => response.json())
    .then(data => {
        // Aquí 'data' contendrá los datos del resultado de la consulta
            if (tipoFuntion === 'tablePc') {
                imprecioDataPc(data, cuaal)
            }else if(tipoFuntion === 'tableOficina'){
                imprecioDataOficina(data)
            } 
        })
}
function imprecioDataOficina(dataOfici) {
    dataOfici.forEach(element => {
        const liOfice = document.createElement("li")
        liOfice.textContent = element.nombre_oficna
        contentUlTable.appendChild(liOfice)
        liOfice.addEventListener('click',(e)=>{
            e.preventDefault();
            contenidoTabla.innerHTML = ''
            comova = element.nombre_oficna
            llamadoDataPhpNew('../../php/db/dataTablePc.php', 'tablePc', comova)
        })
    });
}

function imprecioDataPc(array, queRederizo){
    array.forEach(element => {
        const idPc = element.id_computador

        const objetPc = new dispositivoPc({
            idComputador : element.id_computador, 
            codeInvet : element.code_invet, 
            nombrePc : element.nombre_pc, 
            nameUser : element.nameUser, 
            tipoPc : element.tipo_pc, 
            marcaPc : element.marca_pc, 
            sNPc : element.s_n_pc, 
            modelo : element.modelo, 
            procesador : element.procesador, 
            ram : element.ram, 
            tipoRam : element.tipo_ram, 
            almacenamiento : element.almacenamiento, 
            tipoDisco : element.tipo_disco, 
            so : element.so, 
            licenciaSo : element.licencia_so, 
            officev : element.office_v, 
            licenciaOffice : element.licencia_office, 
            marcaMause : element.marca_mause, 
            sNMouse : element.s_n_mouse, 
            modeloMuse : element.modelo_muse, 
            marcaTeclado : element.marca_tecaldo, 
            sNTecaldo : element.s_n_tecaldo, 
            modeloTeclado : element.modelo_teclado, 
            monitorMarca : element.monitorMarca,
            monitorModelo : element.monitorModelo,
            monitorSn : element.monitorSN,
            nameOfi : element.nombre_oficna,
            idOficePc : element.id_ofice_pc,
        })
        if (element.nombre_oficna === queRederizo || queRederizo === "") {
            const cabecaraTableData = document.createElement("div")
            cabecaraTableData.classList.add("cabecara-table-data")
    
            const cabecaraTableDataListName = document.createElement("div")
            cabecaraTableDataListName.classList.add("cabecara-table-data__list-name", "especificaciones")
                //datos
                const dOfice = document.createElement("div")
                dOfice.classList.add("name-list")
                dOfice.textContent = element.nombre_oficna
                const nameUser = document.createElement("div")
                nameUser.classList.add("name-list")
    
                nameUser.textContent = element.nameUser
                const IdInv = document.createElement("div")
                IdInv.classList.add("name-list")
                IdInv.textContent = element.code_invet
    
                const typePc = document.createElement("div")
                typePc.classList.add("name-list")
                typePc.textContent = element.tipo_pc
    
                const cpu = document.createElement("div")
                cpu.classList.add("name-list")
                cpu.textContent = element.procesador
    
                const disco = document.createElement("div")
                disco.classList.add("name-list")
                disco.textContent = element.almacenamiento
    
                const meRam = document.createElement("div")
                meRam.classList.add("name-list")
                meRam.textContent = element.ram
    
                
                cabecaraTableDataListName.append(dOfice,nameUser,IdInv,typePc,cpu,disco,meRam)
            contenidoTabla.append(cabecaraTableData,cabecaraTableDataListName)
    
            //Escuchador de eventos
    
            cabecaraTableDataListName.addEventListener('click', function (e) {
                e.preventDefault();
                console.log(cabecaraTableDataListName);
                console.log(objetPc);
                console.log(element.tipo_pc);
            });
        }
    })
    //imprecioDataOficina(array)
}

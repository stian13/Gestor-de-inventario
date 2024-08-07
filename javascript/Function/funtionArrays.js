
llamadoDataPhpNew('../../php/db/dataTablePc.php', 'tablePc', '', '')
function dtFromComent() {
    const fechaAuto = document.querySelector('.fechaAuto')
    const fechaActual = new Date().toISOString().split('T')[0];
    const apodoUserAdmin = document.querySelector('.apodoUser')
    fechaAuto.value = fechaActual
}
//CODIGO QUE SE ENCARGA DE COLOCAR TODAS LAS OFICINAS EN CASO DE QUE EL USUARIO QUIERA CAMBIAR DE OFICINA EL EQUIPO
function colocadorDeOficina(packOficinas, dondeSeInstala) {
    packOficinas.forEach(element => {
        const opcionOficina = document.createElement('option');
        opcionOficina.value = element.id_oficinas; // Usar la ID como valor
        opcionOficina.text = element.nombre_oficna; // Usar el nombre como texto
        dondeSeInstala.appendChild(opcionOficina);
    });
}
// Función para manejar el evento de cambio en el select
function mostrarOpcionSeleccionada() {
    const selectOficinas = document.getElementById('listOficinas');
    const opcionSeleccionada = selectOficinas.options[selectOficinas.selectedIndex];
    
    // Obtener los inputs
    const inputOficinaActual = document.getElementById('oficinaActual');
    const inputIdOficeSelec = document.getElementById('idOficeSelec');

    // Actualizar los valores de los inputs
    inputOficinaActual.value = opcionSeleccionada.text; // Nombre de la oficina
    inputIdOficeSelec.value = opcionSeleccionada.value; // ID de la oficina
}

// Obtener referencia al select
const selectOficinas = document.getElementById('listOficinas');

// Agregar event listener para el evento de cambio
selectOficinas.addEventListener('change', mostrarOpcionSeleccionada);
// fin codigo de selecion de oficina

//Funcion que coloca la informacion en el formulario de un pc
function colocadorInfoForm(dataObject) {
    invenCd.value = dataObject.codeInvet
    
    llamadoDataPhpNew('../../php/db/dataOficina.php', 'soloTreaOficinas', '', '')
    
    tipoComputadora.value = dataObject.tipoPc
    if (dataObject.tipoPc) {
        const option = document.createElement("option")
        option.value = dataObject.tipoPc + " uno "
        option.textContent = dataObject.tipoPc + " uno "
        tipoComputadora.appendChild(option)
        console.log(tipoComputadora);
    }
    tipoComputadora.addEventListener('click', (e)=>{
        e.preventDefault();
        tipoPcActual.value = tipoComputadora.value
    })

    oficinaActual.value = dataObject.nameOfi
    //datos del computador
    codePc.value = dataObject.idComputador
    pcMarca.value = dataObject.marcaPc
    pcSn.value = dataObject.sNPc
    tipoPcActual.value = dataObject.tipoPc
    nameUsuario.value = dataObject.nameUser
    pcModel.value = dataObject.modelo
    cerebroPc.value = dataObject.procesador
    memoryRam.value = dataObject.ram
    ramTipo.value = dataObject.tipoRam
    almacenDisco.value = dataObject.almacenamiento
    diskType.value = dataObject.tipoDisco
    versionOffice.value = dataObject.officev
    licenseOffice.value = dataObject.licenciaOffice
    pcName.value = dataObject.nombrePc
    SO.value = dataObject.so
    lisenceSO.value = dataObject.licenciaSo
    //datos del monitor
    monitorMarca.value = dataObject.monitorMarca
    modelMonitor.value = dataObject.monitorModelo
    monitorSn.value = dataObject.monitorSN
    //datos del mause 
    marcaMause.value = dataObject.marcaMause
    modelMouse.value = dataObject.modeloMuse
    mouseSn.value = dataObject.sNMouse
    //datos del teclado
    keyboardMarca.value = dataObject.marcaTeclado
    keyboardModelo.value = dataObject.modeloTeclado
    keyboardSN.value = dataObject.sNTecaldo
}
function colocadorInfoFormScan(objeto) {
    invenCd.value = objeto.codeInventInt
    llamadoDataPhpNew('../../php/db/dataOficina.php', 'soloTreaOficinas', '', '')
    tipoPcActual.value = objeto.tipoImpresora
    console.log(objeto.tipoImpresora);
    if (objeto.tipoImpresora) {
        const option = document.createElement("option")
        option.value = objeto.tipoImpresora + " uno "
        option.textContent = objeto.tipoImpresora + " uno "
        tipoimpScan.appendChild(option)
        console.log(tipoimpScan);
    }
    tipoimpScan.addEventListener('click', (e)=>{
        e.preventDefault();
        tipoPcActual.value = tipoimpScan.value
    })
    
    idPrincipalDispositivo.value = objeto.idImpScan
    oficinaActual.value = objeto.nameOficina
    console.log(idPrincipalDispositivo.value);
    sNImpScan.value = objeto.sNImpresora
    modeloImpScan.value = objeto.nombreModelo
    marcaImpScan.value = objeto.marca
}
//esta funcion se ecarga de mostrar la informacion del pc seleccionado 
function rederHtmlInfoPc(objetPc, tipoSolicitud) {

    if (tipoSolicitud == "pc") {
        for (const key in objetPc) {
            if (objetPc.hasOwnProperty(key)) {
                if (typeof objetPc[key] === 'undefined') {
                    objetPc[key] = '';
                }
            }
        }

        mainInfoDispositivo.innerHTML = `<!--Especificaciones generales-->
        <section class="info-dispostivo-section">
            <!--codigo-->
            <div class="code-dispositivo">
                <h3 class="blue-title">Codigo Inventario</h3>
                <p>${objetPc.codeInvet}</p>
            </div>
            <!--Carateristicas de ubicacion-->
            <div class="info-ubicacion">
                <div class="tex-content-info">
                    <h4 class="blue-title">Nombre de Oficina</h4>
                    <p>${objetPc.nameOfi}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Tipo</h4>
                    <p>${objetPc.tipoPc}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Marca</h4>
                    <p>${objetPc.marcaPc}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title" >S/N</h4>
                    <p>${objetPc.sNPc}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Nombre de Usuario</h4>
                    <p>${objetPc.nameUser}</p>
                </div>
            </div>
            <!--Caracteristicas Tecnicas-->
            <div class="especificaciones-tecnicas-content">
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">Modelo</h4>
                    <p>${objetPc.modelo}</p>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title" >Peocesador</h4>
                    <p>${objetPc.procesador}</p>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title" >Memoria RAM</h4>
                    <p>${objetPc.ram}</p>

                    <h4 class="blue-title">Tipo</h4>
                    <p>${objetPc.tipoRam}</p>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">Almacenamiento</h4>
                    <p>${objetPc.almacenamiento}</p>

                    <h4 class="blue-title">Tipo</h4>
                    <p>${objetPc.tipoDisco}</p>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">OFFICE VERSION</h4>
                    <p>${objetPc.officev}</p>

                    <h4 class="blue-title">licencia</h4>
                    <p>${objetPc.licenciaOffice}</p>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title">Nombre de Equipo</h4>
                    <p>${objetPc.nombrePc}</p>
                </div>
                <div class="info-tecnica-tex-div">
                    <h4 class="blue-title ">Sistema Operativo</h4>
                    <p>${objetPc.so}</p>

                    <h4 class="blue-title">licencia</h4>
                    <p>${objetPc.licenciaSo}</p>
                </div>
            </div>
            <hr class="linea-divisora">
            <!--Caracteristicas perifericos-->
            <div class="content-perifericos">
                <h4 class="blue-title">Monitor</h4>
                <div class="periferico">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <p>${objetPc.monitorMarca}</p>
                    </div>
                    <div class="tex-content-info"> 
                        <h4 class="blue-title">Modelo</h4>
                        <p>${objetPc.monitorModelo}</p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Codigo S/N</h4>
                        <p>${objetPc.monitorSn}</p>
                    </div>
                    
                </div>
            </div>
            <hr class="linea-divisora">
            <div class="content-perifericos">
                <h4 class="blue-title">Mouse</h4>
                <div class="periferico">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <p>${objetPc.marcaMause}</p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Modelo</h4>
                        <p>${objetPc.modeloMuse}</p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Codigo S/N</h4>
                        <p>${objetPc.sNMouse}</p>
                    </div>
                </div>
            </div>
            <hr class="linea-divisora">
            <div class="content-perifericos">
                <h4 class="blue-title">Teclado</h4>
                <div class="periferico">
                    <div class="tex-content-info">
                        <h4 class="blue-title">Marca</h4>
                        <p>${objetPc.marcaTeclado}</p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Modelo</h4>
                        <p>${objetPc.modeloTeclado}</p>
                    </div>
                    <div class="tex-content-info">
                        <h4 class="blue-title">Codigo S/N</h4>
                        <p>${objetPc.sNTecaldo}</p>
                    </div>
                </div>
            </div>
        </section>
        `;
        
        //const sectorEditInfoPc = document.querySelector('#sectorEditInfoPc')
        //aca nos permite editar la informacion del pc al darle click al boton de editar, nos mostrara un formulario
        const btnEdition = document.querySelector('#btnEdition')
        btnEdition.classList.remove('desactivar')
            //Botones Internos 
            const editInfoPc = document.querySelector('#editInfoPc')
            mainInfoDispositivo.appendChild(btnEdition)
            editInfoPc.addEventListener('click', (e)=>{
                e.preventDefault();
                formEditionPc.classList.remove('desactivar')
                colocadorInfoForm(objetPc)
                //sectorEditInfoPc.appendChild(formEditionPc)
            })
        //codigo que se encarga de eliminar el dispositivo
        btnEliminar.addEventListener('click', (e)=>{
            e.preventDefault();
            const formEliminarPc = document.querySelector('#formEliminarPc')
            formEliminarPc.classList.remove('desactivar')
            const idPcEleminar = document.querySelector('#idPcEleminar')
            idPcEleminar.value = objetPc.idComputador
            console.log(objetPc.idComputador);
            //este codigo nos permite cancelar la eliminacion del dispositivo
            const cancelarEliminacion = document.querySelector('#cancelarEliminacion')
            cancelarEliminacion.addEventListener('click', (e)=>{
                e.preventDefault();
                idPcEleminar.value = '';
                formEliminarPc.classList.add('desactivar')
            })
        })

        const sectionNotes = document.createElement('section')
        sectionNotes.classList.add('section-notes')

        const titleNota = document.createElement('h2')
        titleNota.classList.add("color-blanco")
        titleNota.textContent = "Notas"
        
    //<div class="style-btn add-note-btn">Agregar nota</div>
        const btnAgregarNota = document.createElement('button')
        btnAgregarNota.classList.add("style-btn", "add-note-btn")
        btnAgregarNota.innerText = "Agregar Nota"
        sectionNotes.append(titleNota)
            console.log(objetPc.comentario);

            objetPc.comentario.forEach(infoComent => {
                if (infoComent.fecha == null && infoComent.nombre_user == null && infoComent.nota_pc == null) {
                    return
                }
                sectionNotes.innerHTML += `
                    <div class="card-note">
                        <div class="info-basic-nota">
                            <h4 class="blue-title">${infoComent.fecha}</h4>
                            <div>
                                <p class="blue-title">Encargado del caso :</p>
                                <p>${infoComent.nombre_user}</p>
                            </div>
                        </div>
            
                        <p class="color-gris">
                            ${infoComent.nota_pc}
                        </p>
                    </div>
                    <br>
                `
            /* <section class="section-btn-edition">
                    <div class="style-btn editar-btn">Editar</div>
                    <div class="style-btn borra-btn">Borrar</div>
                    <div class="style-btn add-note-btn">Agregar nota</div>
                </section>*/
            })
        
        sectionNotes.append(btnAgregarNota)
        const meterNota = document.querySelector('.meterNota')
        btnAgregarNota.addEventListener('click', (e)=> {
            e.preventDefault();
            dtFromComent()
            
            const idCompu = document.querySelector('.idCompu')
            idCompu.value = objetPc.idComputador
            
            sectionNotes.append(meterNota)
            meterNota.classList.remove('desactivar')

        })

        meterNota.addEventListener('submit', (e)=>{
            e.preventDefault();
            let fronData = new FormData (meterNota);
            fetch('../db/enviaComentario.php',{
                method : 'POST',
                body : fronData
            })
                .then(res => res.json())
                .then (data => {
                    if (data) {
                        meterNota.innerHTML = ""
                        const mosNewNota = document.querySelector('.newNota')
                        mosNewNota.innerHTML += data
                    }else if (data == "error"){
                        console.log(data);
                    }
                })
        })

        mainInfoDispositivo.appendChild(sectionNotes)
    } else if (tipoSolicitud == "impresoraScan"){
        console.log("impresora xdxdxdxd");

        for (const key in objetPc) {
            if (objetPc.hasOwnProperty(key)) {
                if (typeof objetPc[key] === 'undefined') {
                    objetPc[key] = '';
                }
            }
        }

        mainInfoDispositivo.innerHTML = `
        <section class="info-dispostivo-section">
            <div class="code-dispositivo">
                <h3 class="blue-title">Codigo Inventario</h3>
                <p>${objetPc.codeInventInt}</p>
            </div>
            <div class="info-ubicacion">
                <div class="tex-content-info">
                    <h4 class="blue-title">Nombre Oficina</h4>
                    <p>${objetPc.nameOficina}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Tipo</h4>
                    <p>${objetPc.tipoImpresora}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Marca</h4>
                    <p>${objetPc.marca}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">Modelo</h4>
                    <p>${objetPc.nombreModelo}</p>
                </div>
                <div class="tex-content-info">
                    <h4 class="blue-title">S/N Equipo</h4>
                    <p>${objetPc.sNImpresora}</p>
                </div>
            </div>
        </section>
        `
        const btnEdition = document.querySelector('#btnEdition')
        btnEdition.classList.remove('desactivar')
            //Botones Internos 
            const editInfoPc = document.querySelector('#editInfoPc')
            mainInfoDispositivo.appendChild(btnEdition)
            editInfoPc.addEventListener('click', (e)=>{
                e.preventDefault();
                formEditionPc.classList.remove('desactivar')
                colocadorInfoFormScan(objetPc)
                console.log("me he ejecutado");
                //sectorEditInfoPc.appendChild(formEditionPc)
            })
        //codigo que se encarga de eliminar el dispositivo
        btnEliminar.addEventListener('click', (e)=>{
            e.preventDefault();
            const formEliminarPc = document.querySelector('#formEliminarPc')
            formEliminarPc.classList.remove('desactivar')
            const idPcEleminar = document.querySelector('#idPcEleminar')
            idPcEleminar.value = objetPc.idImpScan
            console.log(objetPc.idImpScan);
            //este codigo nos permite cancelar la eliminacion del dispositivo
            const cancelarEliminacion = document.querySelector('#cancelarEliminacion')
            cancelarEliminacion.addEventListener('click', (e)=>{
                e.preventDefault();
                idPcEleminar.value = '';
                formEliminarPc.classList.add('desactivar')
            })
        })

        // seccion de notas
        const sectionNotes = document.createElement('section')
        sectionNotes.classList.add('section-notes')

        const titleNota = document.createElement('h2')
        titleNota.classList.add("color-blanco")
        titleNota.textContent = "Notas"
        
        //<div class="style-btn add-note-btn">Agregar nota</div>
        const btnAgregarNota = document.createElement('button')
        btnAgregarNota.classList.add("style-btn", "add-note-btn")
        btnAgregarNota.innerText = "Agregar Nota"
        sectionNotes.append(titleNota)

            objetPc.comentario.forEach(infoComent => {
                if (infoComent.fecha == null && infoComent.apodo_user == null && infoComent.parrafo == null) {
                    return
                }
                sectionNotes.innerHTML += `
                    <div class="card-note">
                        <div class="info-basic-nota">
                            <h4 class="blue-title">${infoComent.fecha}</h4>
                            <div>
                                <p class="blue-title">Encargado del caso :</p>
                                <p>${infoComent.apodo_user}</p>
                            </div>
                        </div>
            
                        <p class="color-gris">
                            ${infoComent.parrafo}
                        </p>
                    </div>
                    <br>
                `
            /* <section class="section-btn-edition">
                    <div class="style-btn editar-btn">Editar</div>
                    <div class="style-btn borra-btn">Borrar</div>
                    <div class="style-btn add-note-btn">Agregar nota</div>
                </section>*/
                
            })
            sectionNotes.append(btnAgregarNota)
                const meterNota = document.querySelector('.meterNota')
                btnAgregarNota.addEventListener('click', (e)=> {
                    e.preventDefault();
                    dtFromComent()
                    
                    const idCompu = document.querySelector('.idCompu')
                    idCompu.value = objetPc.idImpScan
                    
                    sectionNotes.append(meterNota)
                    meterNota.classList.remove('desactivar')
 
                })

                meterNota.addEventListener('submit', (e)=>{
                    e.preventDefault();
                    let fronData = new FormData (meterNota);
                    fetch('../db/enviaComentarioScanImpre.php',{
                        method : 'POST',
                        body : fronData
                    })
                        .then(res => res.json())
                        .then (data => {
                            if (data) {
                                meterNota.innerHTML = ""
                                const mosNewNota = document.querySelector('.newNota')
                                mosNewNota.innerHTML += data
                            }else if (data == "error"){
                                console.log(data);
                            }
                        })
                })

                mainInfoDispositivo.appendChild(sectionNotes)

    }
}
/*Funcion que mostrara todas las oficinas*/
function imprecioDataOficina(dataOfici, typeTarea, nameOneOfi) {
    //imprime toda la lista de oficinas
    if (typeTarea == "todasLasOficinas") {
        dataOfici.forEach(element => {
            
            const liOfice = document.createElement("li")
            liOfice.textContent = element.nombre_oficna
            contentUlTable.appendChild(liOfice)
            // en caso de que se de click a una de las oficinas, el siguiente codigo lo que ara mostrar todos los equipos que esten esa oficina
            liOfice.addEventListener('click',(e)=>{
                e.preventDefault();
                contenidoTabla.innerHTML = ''
                comova = element.nombre_oficna
                //llamadoDataPhpNew('../../php/db/dataTablePc.php', 'mostrar', comova, '')

                if (cleanUrl === urlPc) {
                    llamadoDataPhp('../../php/db/dataTablePc.php', 'tablePcFiltrado', comova)
                } else if(cleanUrl === urlImpresora){
                    llamadoDataPhp('../../php/db/dataTableImpresora.php', 'tablePcFiltrado', comova)
                }
                /*
                if (cleanUrl == urlPc){
                    llamadoDataPhpNew('../../php/db/dataTablePc.php', 'tablePc', comova)
                }else if (cleanUrl == urlImpresora){
                    //llamadoDataPhpNew('../../php/db/dataTableImpresora.php', 'tablePc', comova)
                    console.log("es impresora");
                }*/
                console.log("me he ejecutado");
            })
        });
    } else if (typeTarea == "oficinasFormulario") {
        
        const optionOne = document.createElement("option");
        optionOne.textContent = nameOneOfi;
        optionOne.value = nameOneOfi;
                oficina.appendChild(optionOne);

                dataOfici.forEach(element => {
            //<option value="Recaudo">Recaudo</option>
            if (nameOneOfi != element.nombre_oficna) {
                const option = document.createElement("option");
                option.textContent = element.nombre_oficna;
                option.value = element.nombre_oficna;
                oficina.appendChild(option);
            }
        });
    }
}
llamadoDataPhpNew('../../php/db/dataOficina.php', 'funcionAllOficinas', 'todasLasOficinas', '')

//la funcion imprecionDataPc inprime la lista de pc que hay
function imprecioDataPc(array, queRederizo){
    console.log(mostrarInfoPcOrImpresora);
        if (mostrarInfoPcOrImpresora === "pc") {
            array.forEach(element => {
                const objetPc = {
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
                    //MAUSE
                    marcaMause : element.marca_mause, 
                    sNMouse : element.s_n_mouse, 
                    modeloMuse : element.modelo_muse, 
                    //TECLADO DATA
                    marcaTeclado : element.marca_tecaldo, 
                    sNTecaldo : element.s_n_tecaldo, 
                    modeloTeclado : element.modelo_teclado,
                    //MONITOR
                    monitorMarca : element.marca_monitor,
                    monitorModelo : element.modelo_monitor,
                    monitorSn : element.s_n_monitor,
                    //oficina
                    nameOfi : element.nombre_oficna,
                    idOficePc : element.id_ofice_pc,
                    //comentarios
                    comentario : element.comentarios,
                }
                
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
                        console.log();
                        
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
                        contentPestañaTable.classList.add("desactivar")
                        
                        infoPcCase.classList.remove("desactivar")
        
                        totalHeader.classList.add("desactivar")
                        btnControlTablePc.classList.add("desactivar")
                        console.log(objetPc.comentario);
                        rederHtmlInfoPc(objetPc, "pc");
                    });
                }
            })
        } else if (mostrarInfoPcOrImpresora === "impresora"){
            array.forEach(element => {
                console.log(array);
                const objetImpScan = {
                    idImpScan : element.id_imp_scan,
                    codeInventInt : element.code_invent_int,
                    marca : element.marca,
                    nombreModelo : element.nombre_modelo,
                    tipoImpresora : element.tipo_impresora,
                    idOficinaImpre : element.id_oficina_impre,
                    sNImpresora : element.s_n_impresora,
                    nameOficina : element.nombre_oficna,
                    //comentarios
                    comentario : element.comentarios,
                }
                if (element.nombre_oficna === queRederizo || queRederizo === "") {
                    const cabecaraTableDataListName = document.createElement("div")
                    cabecaraTableDataListName.classList.add("cabecara-table-data__list-name", "especificaciones")
                        //datos
                        const dOfice = document.createElement("div")
                        dOfice.classList.add("name-list")
                        dOfice.textContent = element.nombre_oficna
        
                        const codeInventInt = document.createElement("div")
                        codeInventInt.classList.add("name-list")
                        codeInventInt.textContent = element.code_invent_int
                        console.log();
                        
                        const tipoDipositivo = document.createElement("div")
                        tipoDipositivo.classList.add("name-list")
                        tipoDipositivo.textContent = element.tipo_impresora
            
                        const marcaDispositivo = document.createElement("div")
                        marcaDispositivo.classList.add("name-list")
                        marcaDispositivo.textContent = element.marca
            
                        const modeloEquipo = document.createElement("div")
                        modeloEquipo.classList.add("name-list")
                        modeloEquipo.textContent = element.nombre_modelo
            
                        const sNEquipo = document.createElement("div")
                        sNEquipo.classList.add("name-list")
                        sNEquipo.textContent = element.s_n_impresora
    
                        cabecaraTableDataListName.append(dOfice,codeInventInt,tipoDipositivo,marcaDispositivo,modeloEquipo,sNEquipo)
                        contenidoTabla.append(cabecaraTableDataListName)
            
                    //Escuchador de eventos
                    
                    cabecaraTableDataListName.addEventListener('click', function (e) {
                        e.preventDefault();
                        contentPestañaTable.classList.add("desactivar")
                        
                        infoPcCase.classList.remove("desactivar")
        
                        totalHeader.classList.add("desactivar")
                        btnControlTablePc.classList.add("desactivar")
                        //console.log(objetPc.comentario);
                        rederHtmlInfoPc(objetImpScan, "impresoraScan");
                    });
                }
            })
        }
    //imprecioDataOficina(array)
}


function recargar() {
    let randomNumber = Math.floor(Math.random() * 1000000);
    let nuevaURL = window.location.href + '?random=' + randomNumber;
    window.location.href = nuevaURL;
}
function redirigir (lugar) {
    window.location.href = lugar;
}
regresarTablePc.addEventListener('click', (e)=>{
    e.preventDefault();
    recargar();
})
regresarAlMenu.addEventListener ('click', (e)=>{
    e.preventDefault();
    redirigir('./invetarioPestañaPrincipal')
})
reloadTablaPc.addEventListener('click', (e)=>{
    e.preventDefault;
    recargar();
})

btnAgregarPC.addEventListener('click', (e)=>{
    e.preventDefault();
    if (mostrarInfoPcOrImpresora === "pc") {
        redirigir('./agregarNewPc.php')
    } else {
        redirigir('./agragarImoScam.php')
    }
})

//invetarioPestañaPrincipal.php

/*
formEditionPc.addEventListener('submit', (e)=>{
    e.preventDefault();
    let fronData = new FormData (formEditionPc);
    fetch('../db/edicionDataPc.php',{
        method : 'POST',
        body : fronData
    })
        .then(res => res.json())
        .then (data => {
             console.log(data);
        })
})*/
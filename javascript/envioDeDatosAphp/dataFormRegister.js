//contenedor formulario
const containerFormCard = document.querySelector('.container-form__card');

//Formulario de registro
const formRegistro = document.querySelector('#formulario-registro');
const respuesta = document.querySelector('#respuesta');
const btnRegistro = document.querySelector('#btn-registro');

    const fullNameInput = document.querySelector('#nameFull');
    const nameUserInput = document.querySelector('#userName');
    const correoInput = document.querySelector('#email');
    const passwordInput = document.querySelector('#contraseña');

const mensajeResN = document.querySelector('.mensaje-n');
const mensajeResP = document.querySelector('.mensaje-p');
//btn mensajes
const btnRecargar = document.querySelector('.btn-recargar')
const btnLogirRedirec = document.querySelector('.btn-loginR')
//fucniones
let estado = false;



function mostrarMensajes(resDbMs) {
    if (resDbMs === "Existing-User"){
        mensajeResN.classList.remove('inactivo');
        containerFormCard.classList.add('inactivo');
        //recargar pagina
        btnRecargar.addEventListener('click', (e)=>{
            e.preventDefault();
            location.reload(true);
        })  
    }else if(resDbMs === "User-Aggregator"){
        mensajeResP.classList.remove('inactivo');
        containerFormCard.classList.add('inactivo');
        //redireccion a inicio de sesion
        btnLogirRedirec.addEventListener('click', (e)=>{
            e.preventDefault();
            window.location.href = './sesionIniciar.html';
        })
        
    }
}

function limpiaInput(sePuede) {
    if (sePuede){
        fullNameInput.value = '';
        nameUserInput.value = '';
        correoInput.value = '';
        passwordInput.value = '';
    }
}

function envioDataForm (ubicacion, contentForm,){
    fetch(ubicacion,{
        method : 'POST',
        body : contentForm
    })
        .then(res => res.json())
        .then (data => {
             mostrarMensajes(data)
        })
}


//Eventos
formRegistro.addEventListener('submit', function (e) {
    e.preventDefault();
    let dataForm = new FormData (formRegistro);
    envioDataForm('../php/iniciar-sesion/registro.php', dataForm)
    limpiaInput(true)
})
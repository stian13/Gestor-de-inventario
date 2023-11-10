//Formulario de registro
const formRegistro = document.querySelector('#formulario-registro');

//fucniones
function envioDataForm (ubicacion, contentForm,){
    fetch(ubicacion,{
        method : 'POST',
        body : contentForm
    })
        .then(res => res.json())
        .then (data => {
            console.log(data)
        })
}
//Eventos
formRegistro.addEventListener('submit', function (e) {
    e.preventDefault();
    let dataForm = new FormData (formRegistro);
    envioDataForm('../php/iniciar-sesion/registro.php', dataForm)
})
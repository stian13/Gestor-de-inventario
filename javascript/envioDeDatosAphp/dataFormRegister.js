//Formulario de registro
const formRegistro = document.querySelector('#formulario-registro');
let dataForm;
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
function atrapaDatos(selecForm) {
    dataForm = new FormData (selecForm);
    console.log(dataForm);
    console.log(dataForm.get('full_name'));
    return dataForm
}
//Eventos
formRegistro.addEventListener('submit', function (e) {
    e.preventDefault();
    atrapaDatos(formRegistro);
    /*
    let datos = new FormData (formRegistro);
    console.log(datos);
    fetch('../php/iniciar-sesion/registro.php',{
        method : 'POST',
        body : datos
    })
        .then(res => res.json())
        .then (data => {
            console.log(data)
        })
        envioDataForm('../php/iniciar-sesion/registro.php', datos);
*/
})
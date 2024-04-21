//formulario de autenticacion
const fromAutenticacion = document.querySelector(".form-login")

function envioDataForm (ubicacion, contentForm,){
    fetch(ubicacion,{
        method : 'POST',
        body : contentForm
    })
        .then(res => res.json())
        .then (data => {
            if (data == "error en la autenticacion") {
                const errorperson = document.querySelector(".errorperson");
                errorperson.innerHTML = "tubimos un erro de autenticaion"
            }
        })
}
fromAutenticacion.addEventListener('submit', function (e) {
    e.preventDefault();
    let dataAutenticacion = new FormData (fromAutenticacion);
    envioDataForm('../php/iniciar-sesion/inicio-sesion.php', dataAutenticacion)  
})
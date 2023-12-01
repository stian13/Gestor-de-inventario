//redireccion boton a inicio de sesion
const inicioDeSesion = document.querySelector('#inicio-de-sesion')
//redireccion boton a inicio de sesion
const registro = document.querySelector('#registro')


//Funcion de redireccion 
function redireccion(ubicacion) {
    window.location.href = ubicacion;
}

//eventros click
    //inicio de sesion redireccion
inicioDeSesion.addEventListener('click', function (e){
    e.preventDefault();
    redireccion("./html/sesionIniciar.html?nocache=" + Math.random())
});
    //pagina de registro redireccion
registro.addEventListener('click', function (e){
    e.preventDefault();
    redireccion("./html/Registro.html?nocache=" + Math.random())
});

function submitOnChange($formulario) {
    form = document.getElementById($formulario).submit();   //encuentra el formulario y lo envia(submit)
    /*esta funcion se usa para enviar automaticamente el formulario en cuanto, 
    por ejemplo en este caso, se hace un cambio en la seleccion*/
}


// Creo el objeto para la petición
var peticion = new XMLHttpRequest();

// Programo respuesta a la petición
peticion.onreadystatechange = function (){
    if (peticion.readyState == 4 && peticion.status == 200){
        console.log(peticion.responseText);
        
        var datosJson = JSON.parse (peticion.responseText);

        empleadosRecibidos = datosJson;

        for (var i = 0; i < empleadosRecibidos.length; i++){
            var nombreEmpleado = empleadosRecibidos[i].nombre;
            document.getElementById("caja").innerHTML += nombreEmpleado 
            + "<br>";
        }

    }
};

// FIN Programo respuesta a la petición

// Establezco la comunicación
peticion.open("GET", "../controller/ventasProductos.php", true);
// opmunico
peticion.send();
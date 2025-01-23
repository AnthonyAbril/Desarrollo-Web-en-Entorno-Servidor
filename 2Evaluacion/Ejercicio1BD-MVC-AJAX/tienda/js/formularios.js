function submitOnChange($formulario) {
    form = document.getElementById($formulario).submit();   //encuentra el formulario y lo envia(submit)
    /*esta funcion se usa para enviar automaticamente el formulario en cuanto, 
    por ejemplo en este caso, se hace un cambio en la seleccion*/
}


// Creo el objeto para la petición
var peticion = new XMLHttpRequest();


//recibe los datos del formulario
var cp = document.getElementById("codigo_postal");
var telefono = document.getElementById("telefono");
 
//los empaqueta para mandarlos
query_string = "&codigo_postal=" + encodeURIComponent(cp.value) + "&telefono=" + encodeURIComponent(telefono.value);


peticion.onreadystatechange = procesa_respuesta;

// Establezco la comunicación con el controlador
peticion.open("POST", "../controller/ventasProductos.php", true);


peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//envia los datos del formulario para que el controlador lo procese
peticion.send(query_string);

function procesa_respuesta() {
    if (peticion.readyState == 4 && peticion.status == 200){
        console.log(peticion.responseText);
        
        var datosJson = JSON.parse (peticion.responseText);

        empleadosRecibidos = datosJson;

        console.log(empleadosRecibidos);

    }
}

function getClients() {
    let peticion = new XMLHttpRequest();
    peticion.open('GET', '../controllers/controllerClient.php?action=getClients', true);

    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 200) {
            console.log('Peticion enviada');
            let clients = JSON.parse(peticion.responseText);
            clients.forEach(client => {
                let option = document.createElement('option');
                option.value = client.clienteId;
                option.textContent = `${client.nombre} ${client.apellidos}`;
                selectClient.appendChild(option);
            });
        }
    }
    
    peticion.send();
}
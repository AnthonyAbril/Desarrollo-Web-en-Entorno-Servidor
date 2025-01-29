
let respuesta = "";

let peticion = new XMLHttpRequest();


selectClient = document.createElement("select");

//al recibir una respuesta del controlador
peticion.onreadystatechange = function () {
    if (peticion.readyState == 4 && peticion.status == 200) {
        console.log("Peticion enviada");
        
        console.log("respuesta: " + peticion.responseText);
        
        let clients = JSON.parse(peticion.responseText);


        //recorrido de tego
        if(false){
            selectClient.innerHTML = "";

            //por cada cliente
            clients.forEach((client) => {
                let option = document.createElement("option");  //crea una etiqueta <option>
                option.value = client.clienteId;    //le da el valor "clienteId"
                option.textContent = `${client.nombre} ${client.apellidos}`;    //le añade al texto el nombre y apellido
                selectClient.appendChild(option);   //añade el elemento <option> al <select>
            });

            document.body.appendChild(selectClient);
        }

        
        //mi recorrido

        panel = document.getElementById("panel");

        panel.innerHTML = "";

        //por cada cliente
        clients.forEach((client) => {

            let fila = document.createElement("tr");   //creamos una fila

            let celdaId = document.createElement("td"); //creamos una celda para el Id
            celdaId.textContent = `${client.id_cliente}`;    //le da el texto "clienteId"

            let celdaNombre = document.createElement("td"); //creamos una celda para el Nombre
            celdaNombre.textContent = `${client.nombre} ${client.apellidos}`;    //le añade al texto el nombre y apellido
            
            //añade las celdas a la fila
            fila.appendChild(celdaId);   
            fila.appendChild(celdaNombre);

            panel.appendChild(fila);
        });

        //panel.innerHTML = "<p>"+respuesta+"</p>";    //lo introduce en el div
    }
};

//al pulsar el boton
function cargar(){

    respuesta = document.getElementById("nombre").value;    //obtiene el valor de lo que esta escrito

    peticion.open(
        "POST",
        "../controller/c_clientes.php",
        true
    );

    peticion.send(respuesta);   //lo envia al controlador
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("f_clientes").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que se envíe el formulario
        cargar(); // Llama a la función que muestra la respuesta
    });
});

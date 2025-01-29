
let respuesta = "";

let peticion = new XMLHttpRequest();

peticion.open(
    "POST",
    "../controller/c_clientes.php",
    true
);

if (peticion.readyState == 4 && peticion.status == 200) {
    alert('cliente enviado.');
}

peticion.send(respuesta);

//al pulsar el boton
function cargar(){

    respuesta = document.getElementById("nombre").value;    //obtiene el valor de lo que esta escrito




    document.getElementById("panel").innerHTML = "<p>"+respuesta+"</p>";    //lo introduce en el div
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("f_clientes").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que se envíe el formulario
        cargar(); // Llama a la función que muestra la respuesta
    });
});

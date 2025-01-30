document.addEventListener("DOMContentLoaded", function () {
    // Evita el envío automático de formularios
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
        });
    });
});

// Función para cargar clientes (GET)
function cargar() {
    const nombre = document.getElementById("nombre").value.trim();

    let url = "../controller/c_clientes.php";
    
    // Si 'nombre' no está vacío, añadirlo como parámetro `id` en la URL
    if (nombre) {
        url += `?id=${encodeURIComponent(nombre)}`;
    }

    let peticion = new XMLHttpRequest();
    peticion.open("GET", url, true);
    
    peticion.onreadystatechange = function () {
        if (peticion.readyState === 4) {
            if (peticion.status === 200) {
                // Si la respuesta es un array de clientes
                try {
                    let clients = JSON.parse(peticion.responseText);
                    console.log("Clientes obtenidos:", clients);
                    generarTabla(clients);
                } catch (e) {
                    console.error("Error al parsear la respuesta:", e);
                }
            } else {
                console.error("Error al cargar clientes:", peticion.status);
            }
        }
    };
    
    peticion.send();
}

// Función para insertar un cliente (POST)
function insertar() {
    const nombre = document.getElementById("nombreInsertar").value.trim();
    const apellido = document.getElementById("apellidoInsertar").value.trim();
    const tel = document.getElementById("telInsertar").value.trim();

    if (!nombre || !apellido || !tel) {
        alert("Todos los campos son obligatorios");
        return;
    }

    const datos = JSON.stringify({ nombre, apellido, telefono: tel });

    let peticion = new XMLHttpRequest();
    peticion.open("POST", "../controller/c_clientes.php", true);
    peticion.setRequestHeader("Content-Type", "application/json");

    peticion.onreadystatechange = function () {
        if (peticion.readyState === 4) {
            if (peticion.status === 201) {
                alert("Cliente insertado correctamente");
                console.log("Respuesta del servidor:", peticion.responseText);
                cargar(); // Recargar la lista después de eliminar
            } else {
                console.error("Error al insertar cliente:", peticion.status, peticion.responseText);
                alert("No se pudo insertar el cliente.");
            }
        }
    };

    peticion.send(datos);
}

// Función para eliminar un cliente (DELETE)
function borrar(id) {
    if (!confirm("¿Estás seguro de que deseas eliminar este cliente?")) return;

    let peticion = new XMLHttpRequest();
    peticion.open("DELETE", `../controller/c_clientes.php?id=${id}`, true);

    peticion.onreadystatechange = function () {
        if (peticion.readyState === 4) {
            if (peticion.status === 200) {
                alert("Cliente eliminado correctamente");
                cargar(); // Recargar la lista después de eliminar
            } else {
                console.error("Error al eliminar cliente:", peticion.status);
                alert("No se pudo eliminar el cliente.");
            }
        }
    };

    peticion.send();
}

// Función para generar la tabla de clientes
function generarTabla(clients) {
    const panel = document.getElementById("panel");
    panel.innerHTML = "";

    clients.forEach(client => {
        const fila = document.createElement("tr");

        const celdaId = document.createElement("td");
        celdaId.textContent = client.Id;

        const celdaNombre = document.createElement("td");
        celdaNombre.textContent = `${client.Nombre} ${client.Apellidos}`;

        const celdaModificar = document.createElement("td");
        const botonModificar = document.createElement("button");
        botonModificar.textContent = "Modificar";
        botonModificar.addEventListener("click", () => crearFormulario(client.Id, "modificar"));
        celdaModificar.appendChild(botonModificar);

        const celdaBorrar = document.createElement("td");
        const botonBorrar = document.createElement("button");
        botonBorrar.textContent = "Borrar";
        botonBorrar.addEventListener("click", () => borrar(client.Id));
        celdaBorrar.appendChild(botonBorrar);

        fila.appendChild(celdaId);
        fila.appendChild(celdaNombre);
        fila.appendChild(celdaModificar);
        fila.appendChild(celdaBorrar);

        panel.appendChild(fila);
    });
}

// Función para crear formulario dinámico (puedes expandirla)
function crearFormulario(id, accion) {
    console.log(`${accion} ${id}`);
    const form = document.getElementById("formularioModificar");
    form.innerHTML = "";

    const boton = document.createElement("button");
    boton.textContent = "Enviar";
    form.appendChild(boton);
}

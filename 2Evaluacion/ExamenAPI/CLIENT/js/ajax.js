
//const datos = JSON.stringify({ nombre, apellido, telefono: tel });

const urlAPI = "../../API/controller/c_alumno.php";

function crearListaAlumnos(alumnos){
    const listaAlumnos = document.getElementById("alumno");

    listaAlumnos.innerHTML = "";

    alumnos.forEach(alumno => {
        let opcion = document.createElement("option");
        
        opcion.setAttribute("value",alumno["nia"]);
        opcion.textContent = alumno["nombre"] + " " + alumno["apellidos"];

        listaAlumnos.appendChild(opcion);
    });
}

function crearListaAsignaturas(asignaturas){
    const listaAsignaturas = document.getElementById("asignatura");

    listaAsignaturas.innerHTML = "";

    asignaturas.forEach(asignatura => {
        let opcion = document.createElement("option");
        
        opcion.setAttribute("value",asignatura["codigo"]);
        opcion.textContent = asignatura["nombre"];

        listaAsignaturas.appendChild(opcion);
    });
}

function crearTablaMatriculas(tablaHTML){
    tabla = document.getElementById("matriculas-lista");
    
    tabla.innerHTML = tablaHTML;
}

function cargar(accion,nia=null){

    //añadir get a url
    // Si 'nombre' no está vacío, añadirlo como parámetro `nia` en la URL
    let url = urlAPI;

    url += `?accion=${encodeURIComponent(accion)}`;
    
    if (nia) {
        url += `?nia=${encodeURIComponent(nia)}`;
    }

    let peticion = new XMLHttpRequest();
    peticion.open("GET", url, true);
    
    peticion.setRequestHeader("Content-Type","application/json");

    peticion.onreadystatechange = function () {
        if (peticion.readyState === 4) {
            if (peticion.status === 200) {
                // Si la respuesta es un array de clientes
                try {
                    //recibe las cosas
                    respuesta = peticion.responseText;
                    console.log(respuesta);

                    if(accion=="matriculas"){
                        //crear listado matriculas
                        crearTablaMatriculas(respuesta);
                    }else{
                        //parsea el json
                        respuesta = JSON.parse(respuesta);

                        if(accion=="asignaturas"){
                            //crear listado asignaturas
                            crearListaAsignaturas(respuesta);
                        }else if(accion=="alumnos"){
                            //crear listado alumnos
                            crearListaAlumnos(respuesta);
                        }
                    }
                } catch (e) {
                    console.error("Error al parsear la respuesta:", e);
                }
            } else {
                console.error("Error al cargar alumnos:", peticion.status);
            }
        }
    };
    
    peticion.send();

}

//al cargarse la pagina
document.addEventListener("DOMContentLoaded", function () {
    // Evita el envío automático de formularios
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
        });
    });

    cargar("alumnos");

    cargar("asignaturas");

    cargar("matriculas");
});


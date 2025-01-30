
const urlAPI = "../../API/controller/c_alumno.php";

function crearListaAlumnos(alumnos){
    const listaAlumnos = document.getElementById("alumno");

    listaAlumnos.innerHTML = "";    //vacia la lista

    //la rellena con cada alumno
    alumnos.forEach(alumno => {
        let opcion = document.createElement("option");
        
        opcion.setAttribute("value",alumno["nia"]);
        opcion.textContent = alumno["nombre"] + " " + alumno["apellidos"];

        listaAlumnos.appendChild(opcion);
    });
}

function crearListaAsignaturas(asignaturas){
    const listaAsignaturas = document.getElementById("asignatura");

    listaAsignaturas.innerHTML = "";    //vacia la lista

    //la rellena con cada asignatura
    asignaturas.forEach(asignatura => {
        let opcion = document.createElement("option");
        
        opcion.setAttribute("value",asignatura["codigo"]);
        opcion.textContent = asignatura["nombre"];

        listaAsignaturas.appendChild(opcion);
    });
}

function crearTablaMatriculas(tablaHTML){
    tabla = document.getElementById("matriculas-lista");    //encuentra la tabla
    
    tabla.innerHTML = tablaHTML;    //le anade el codigo html recibido
}

function cargar(accion,nia=null){

    let url = urlAPI;

    //le indicamos que queremos obtener
    url += `?accion=${encodeURIComponent(accion)}`;

    //creamos la peticion
    let peticion = new XMLHttpRequest();
    peticion.open("GET", url, true);

    peticion.onreadystatechange = function () {
        if (peticion.readyState === 4) {
            if (peticion.status === 200) {
                // Si la respuesta es correcta
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
                console.error("Error al cargar "+accion+" :", peticion.status);
            }
        }
    };
    
    peticion.send();

}

function insertarMatricula(){


    niaAlumno = document.getElementById("alumno").value;
    codigoAsignatura = document.getElementById("asignatura").value;

    //preparamos el json
    let datos = JSON.stringify({
        nia : niaAlumno,
        codigo : codigoAsignatura,
        ano : "2025" 
    }); 

    //creamos la peticion
    let peticion = new XMLHttpRequest();
    peticion.open("POST", urlAPI, true);
    
    peticion.setRequestHeader("Content-Type","application/json");

    peticion.onreadystatechange = function () {
        if (peticion.readyState === 4) {
            if (peticion.status === 200) {
                // Si la respuesta es un array
                try {
                    //recibe las cosas
                    respuesta = peticion.responseText;
                    console.log(respuesta);

                    cargar("matriculas");
                } catch (e) {
                    console.error("Error al parsear la respuesta:", e);
                }
            } else {
                console.error("Error al cargar matricula:", peticion.status);
            }
        }
    };
    
    peticion.send(datos);
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


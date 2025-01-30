<?php

include_once "../model/m_alumno.php";
include_once "../model/m_asignaturas.php";
include_once "../model/m_matriculas.php";

header('Content-Type: text/html; charset=UTF-8');
header('Content-Type: application/json;  charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

//AL HACERSE GET
if ($_SERVER["REQUEST_METHOD"]=="GET"){

    //sacar nia para un alumno especifico
    $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $accion = isset($_GET["accion"])??null;

    $respuesta;
    if($_GET["accion"]=="alumnos"){

        $respuesta = json_encode(Alumno::ObtenerAlumnos());

        echo ($respuesta);

    }elseif($_GET["accion"]=="asignaturas"){

        $respuesta = json_encode(Asignaturas::ObtenerAsignaturas());

        echo ($respuesta);

    }elseif($_GET["accion"]=="matriculas"){

        //hacer html

        $respuesta = (Matriculas::ObtenerMatriculas());
        $HTMLtext = "";

        foreach ($respuesta as $matricula) {
            $HTMLtext = $HTMLtext. 
            '<li>
            '.$matricula['nia'].' - '.$matricula['nomalu'].' '.$matricula['apellidos'].' - '.$matricula['nombre'].' '.$matricula['año'].'
                <button class="eliminar-matricula" data-nia="'.$matricula['nia'].'" data-codigo="'.$matricula['nia'].'">Eliminar</button>
            </li>';
        }

        echo $HTMLtext;
    }

/*

    try {
        if ($id) {
            // Si se proporciona un id, obtener un cliente específico
            echo (Clientes::ObtenerClientes($id));
        } else {
            // Si no se proporciona un id, obtener todos los clientes
            echo (Clientes::ObtenerClientes());
        }
    } catch (Exception $e) {
        echo json_encode(["error" => "Error al procesar la solicitud", "message" => $e->getMessage()]);
    }
*/ 

}elseif($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $body = file_get_contents("php://input");


}

?>
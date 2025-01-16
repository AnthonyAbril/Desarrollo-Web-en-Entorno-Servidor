<?php

session_start();    //inicia la sesion
include "../model/conexionBD.php";
include "../model/empleado.php";
/*
• Consultar todos los empleados o un empleado específico por su ID.
• Insertar un nuevo empleado en la base de datos.
• Actualizar los datos de un empleado.
• Eliminar un empleado de la base de datos.
*/

if (!isset($_SESSION['username'])||!isset($_SESSION['Empleadoid'])) { 
//si no tiene username ni userid sale a login
    header('Location: auth.php'); //vuelve a registrarse con error
    exit; 
} 

if (isset($_GET['cerrar'])) { 
//al pulsar cerrar
    session_destroy();//elimina la sesion
    header('Location: ../index.php'); //vuelve a registrarse con error
    exit; 
}
    

//RECIBE FORMULARIO
if(isset($_POST["action"])&&$_POST["action"]=="insertar"){
    if(isset($_POST["empleadoNom"], $_POST["empleadoApe"])&&$_POST["empleadoNom"]!=""&&$_POST["empleadoApe"]!=""){

        Empleado::insertarEmpleado($_POST["empleadoNom"],$_POST["empleadoApe"],$_POST["empleadoSal"],$_POST["empleadoPue"]);
        echo "empleado creado";
    }
}


if(isset($_POST["action"])&&$_POST["action"]=="actualizar"){
    if(isset($_POST["empleadoNom"], $_POST["empleadoApe"])&&$_POST["empleadoNom"]!=""&&$_POST["empleadoApe"]!=""){

        Empleado::actualizarEmpleado($_POST["empleadoIDAct"],$_POST["empleadoNom"],$_POST["empleadoApe"],$_POST["empleadoSal"],$_POST["empleadoPue"]);
        echo "empleado actualizado";
    }
}

if(isset($_POST["action"])&&$_POST["action"]=="eliminar"){
    //si se ha presionado eliminar de un empleado
    Empleado::eliminarEmopleado($_POST["empleadoIDElim"]);
    echo "empleado actualizado";
}

$empleados = Empleado::consultarEmpleado();

if(isset($_POST["action"])&&$_POST["action"]=="consultar"){
    if(isset($_POST['empleadoID'])){
        $empleado = Empleado::consultarEmpleado($_POST['empleadoID'])[0];
    }else{
        $empleado = null;
    }
}

include('../views/empleados.php');  //incluye la vista
?>
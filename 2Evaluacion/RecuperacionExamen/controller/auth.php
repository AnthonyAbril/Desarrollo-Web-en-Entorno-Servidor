<?php

session_start();    //inicia la sesion
include "../model/conexionBD.php";  //incluye la conexion a BD
include "../model/user.php";    //incluye el modelo de usuario

    //UNA VEZ SE ENVIA EL FORMULARIO
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//si el metodo es un POST

    if(isset($_POST["username"], $_POST["password"])){
    //si se ha enviado el username y la contraseña
        
        $EmpleadoID = user::verificarUsuario($_POST['username'], $_POST['password']);   //guardamos el Empleadoid si tiene, sino guarda 0
        
    }
    
    if ($EmpleadoID!=0) { 
    //si el usuario existe con su contraseña

        //Abre la sesion
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['Empleadoid'] = $EmpleadoID;
        
        //se envia al controlador de empleados
        header('Location: empleados.php'); 
    } else { 

        //vuelve a la pagina de login con error
        $_GET["error"] = 1; //mensaje de error  
    } 
}

include('../views/login.php');  //incluye la vista

?>

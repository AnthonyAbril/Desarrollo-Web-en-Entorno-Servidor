<?php

session_start();    //inicia la sesion
include "../model/conexionBD.php";  //incluye la conexion a BD
include "../model/user.php";    //incluye el modelo de usuario


    //SI NO SE ACLARA EL FORMULARIO
if(!isset($_GET["form"])){
//si no se ha mandado el tipo de formulario
    $_GET["form"] = "login";  //se establece en login por defectio
}

    //UNA VEZ SE ENVIA EL FORMULARIO
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
//si el metodo es un POST

    if(isset($_POST["username"], $_POST["password"])){
    //si se ha enviado el username y la contraseña
    
        $UserID = user::verificarUsuario($_POST['username'], $_POST['password']);   //guardamos el userid si tiene, sino guarda 0
    }

    if ($_POST['action'] == 'register') {
    //si se ha enviado el action y este es register
        
        if ($UserID==0) { 
        //si la cuenta es valida

            user::crearCuenta($_POST['username'], $_POST['password']);//crear cuenta
            
            $_GET["form"] = "login";    //entra en login
        } else {
            $_GET["error"] = 1; //mensaje de error  
            $_GET["form"] = "register";//entra en login
        } 
    } elseif ($_POST['action'] === 'login') { 
    //si se ha enviado el action y este es login
        
        if ($UserID!=0) { 
        //si el usuario existe con su contraseña

            //Abre la sesion
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['userid'] = $UserID;

            //se envia al controlador de notas
            header('Location: notas.php'); 
        } else { 

            //vuelve a la pagina de login con error
            $_GET["error"] = 1; //mensaje de error  
            $_GET["form"] = "login";//entra en login
        } 
    } 
}


//entra en login o register
if($_GET["form"] == "login"){
    include('../views/login.php');  //incluye la vista
}else if($_GET["form"] == "register"){
    include('../views/register.php');  //incluye la vista
}

?>

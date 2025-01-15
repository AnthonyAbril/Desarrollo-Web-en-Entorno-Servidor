<?php

session_start();
include "../model/conexionBD.php";
include "../model/user.php";

if(isset($_POST["username"], $_POST["password"])){
    //si se ha enviado el username y la contraseña

    $UserID = user::verificarUsuario($_POST['username'], $_POST['password']);   //guardamos el userid si tiene
}

$tipo = $_GET["form"];  //recibe el tipo de formulario

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
    //si el metodo es un POST

    if ($_POST['action'] == 'register') {
        //si se ha enviado el action y este es register
        
        if ($UserID==0) { 
            //si la cuenta es valida

            user::crearCuenta($_POST['username'], $_POST['password']);//crear cuenta
            
            $tipo = "login";//entra en login
        } else {
            $_GET["error"] = 1;
            $tipo = "register";//entra en login
        } 
    } elseif ($_POST['action'] === 'login') { 
        //si se ha enviado el action y este es login
        
        if ($UserID!=0) { 
            //si el usuario existe con su contraseña

            $_SESSION['username'] = $_POST['username']; //Abre la sesion
            $_SESSION['userid'] = $UserID;

            //se envia al controlador de notas
            header('Location: notas.php'); 
        } else { 

            //vuelve a la pagina de login con error
            $_GET["error"] = 1;
            $tipo = "login";//entra en login
        } 
    } 
}

//entra en login o register
if($tipo == "login"){
    include('../views/login.php');  //incluye la vista
}else if($tipo == "register"){
    include('../views/register.php');  //incluye la vista
}

?>

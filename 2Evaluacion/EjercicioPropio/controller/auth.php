<?php

session_start();
include "../model/conexionBD.php";
include "../model/user.php";

$UserID = user::verificarUsuario($_POST['username'], $_POST['password']);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
    //si el metodo es un POST

    if ($_POST['action'] == 'register') {
        //si se ha enviado el action y este es register
        
        if ($UserID==0) { 

            //si la cuenta es valida

            user::crearCuenta($_POST['username'], $_POST['password']);//crear cuenta

            header('Location: ../views/login.php'); //entra al login
        } else { 
            //si no es valida
            header('Location: ../views/register.php?error=1'); //vuelve a registrarse con error
        } 
    } elseif ($_POST['action'] === 'login') { 
        //si se ha enviado el action y este es login
        
        if ($UserID!=0) { 
            //si el usuario existe con su contraseña

            $_SESSION['username'] = $_POST['username']; //Abre la sesion
            $_SESSION['userid'] = $UserID;

            //se envia a la pagina
            header('Location: ../views/notas.php'); 
        } else { 

            //vuelve a la pagina de login con error
            header('Location: ../views/login.php?error=1');
        } 
    } 
}

?>

<?php

session_start();
include "../model/conexionBD.php";
include "../model/user.php";

$UserID = user::verificarUsuario($_POST['username'], $_POST['password']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //si el metodo es un POST

    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        //si se ha enviado el action y este es register
        
        if ($UserID!=0) { 

            //si la cuenta es valida
            header('Location: ../views/login.php'); //entra al login
        } else { 
            //si no es valida
            header('Location: ../views/register.php?error=1'); //vuelve a registrarse con error
        } 
    } elseif (isset($_POST['action']) && $_POST['action'] === 'login') { 
        //si se ha enviado el action y este es login
        
        if ($UserID!=0) { 
            //si el usuario existe con su contraseña

            $_SESSION['username'] = $_POST['username']; //Abre la sesion
            $_SESSION['userid'] = $UserID;

            if (isset($_POST['recordarme'])) { 
                //si hay recuerdame
                //setcookie('username', $_POST['username'], time() + 86400, '/','localhost'); 
            } else {
                //setcookie('username', "", time()-60, '/','localhost');
            }

            //se envia a la pagina
            header('Location: ../views/notas.php'); 
        } else { 

            //vuelve a la pagina de login con error
            header('Location: ../views/login.php?error=1');
        } 
    } 
}

?>

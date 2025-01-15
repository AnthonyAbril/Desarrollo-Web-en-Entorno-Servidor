<?php 
session_start(); 
require_once '../model/user.php'; 

//si no tiene username ni userid sale a login
if (!isset($_SESSION['username'])||!isset($_SESSION['userid'])) { 
    header('Location: ..auth.php'); //vuelve a registrarse con error
    exit; 
} 

//al pulsar cerrar
if (isset($_GET['cerrar'])) { 
    session_destroy();
    header('Location: ../index.php'); //vuelve a registrarse con error
    exit; 
}

//al pulsar actualizar, borrar o añadir
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if ($_POST['action']==="actualizar"){

        if (isset($_POST['note'])) { 
            user::actualizarNota($_POST['note'], $_POST['id']); 
        } 
        
    }elseif($_POST['action']==="borrar"){

        if (isset($_POST['note'])) { 
            user::borrarNota($_POST['id']); 
        } 

    }elseif($_POST['action']==="añadir"){

        user::añadirNota($_SESSION['userid']);
    }
}

//guarda las notas del usuario
$notes = user::listarNotas($_SESSION['username']);

include('../views/notas.php');  //incluye la vista

?> 
 
<?php 
session_start(); 
require_once '../model/nota.php'; 

if (!isset($_SESSION['username'])||!isset($_SESSION['userid'])) { 
//si no tiene username ni userid sale a login
    header('Location: ..auth.php'); //vuelve a registrarse con error
    exit; 
} 

if (isset($_GET['cerrar'])) { 
//al pulsar cerrar
    session_destroy();//elimina la sesion
    header('Location: ../index.php'); //vuelve a registrarse con error
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
//al pulsar actualizar, borrar o añadir

    if ($_POST['action']==="actualizar"){
    
        if (isset($_POST['note'])) { 
            nota::actualizarNota($_POST['note'], $_POST['id']); 
        } 
        
    }elseif($_POST['action']==="borrar"){

        if (isset($_POST['note'])) { 
            nota::borrarNota($_POST['id']); 
        } 

    }elseif($_POST['action']==="añadir"){

        nota::añadirNota($_SESSION['userid']);
    }
}

$notes = nota::listarNotas($_SESSION['username']);  //guarda las notas del usuario

include('../views/notas.php');  //incluye la vista

?> 
 
<?php 
session_start(); 
require_once '../model/user.php'; 
 
if (!isset($_SESSION['username'])||!isset($_SESSION['userid'])) { 
    header('Location: ../views/login.php'); 
    exit; 
} 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if ($_POST['action']==="actualizar"){
        if (isset($_POST['note'])) { 
            user::actualizarNota($_POST['note'], $_POST['id']); 
            //user::añadirNota($_SESSION['username'], $_POST['note'], $_POST['id']); 
        } 
    }elseif($_POST['action']==="borrar"){
        if (isset($_POST['note'])) { 
            user::borrarNota($_POST['id']); 
            //user::añadirNota($_SESSION['username'], $_POST['note'], $_POST['id']); 
        } 
    }elseif($_POST['action']==="añadir"){
        user::añadirNota($_SESSION['userid']);
    }
    
    header('Location: ../views/notas.php'); 
} 
?> 
 
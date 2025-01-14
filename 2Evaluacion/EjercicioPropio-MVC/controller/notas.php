<?php 
session_start(); 
require_once '../model/user.php'; 
 
if (!isset($_SESSION['username'])) { 
    header('Location: ../views/login.php'); 
    exit; 
} 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['note'])) { 
        user::actualizarNota($_POST['note'], $_POST['id']); 
        //user::añadirNota($_SESSION['username'], $_POST['note'], $_POST['id']); 
        header('Location: ../views/notas.php'); 
    } 
} 
?> 
 
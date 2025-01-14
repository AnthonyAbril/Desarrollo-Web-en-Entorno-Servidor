<?php
session_start(); 

require_once '../model/user.php'; 

if (!isset($_SESSION['username'])) { 
    header('Location: login.php'); 
    exit; 
} 
if (isset($_GET['cerrar'])) { 
    session_destroy();
    header('Location: login.php'); 
    exit; 
} 

$notes = user::listarNotas($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas</title>
</head>
<body>
    <ul>
    <?php 
    foreach($notes as $note){

        //Crea una opcion por cada producto
        echo '<li>'.$note['Nota'].'</li>';
    }
    ?>
    </ul>
</body>
</html>
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

echo $_POST["note"];
echo $_POST["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas</title>
</head>
<style>
    div{
        width: 100%; /* Puedes ajustarlo a un ancho específico, como 600px */
        height: 70vh;
        display: flex;
        overflow-x: auto; /* Habilita desplazamiento horizontal */
    }

    form{
        background-color: orange;
        width: 300px;
        display: flex;
        flex-direction: column;
        padding: 10px;
        border-radius: 10px;
        margin: 5px;
    }

    textarea{
        width: 300px;
        height: fit-content;
        height: 100%;
    }
</style>
<body>
    <p>Bienvenid@, <?= htmlspecialchars($_SESSION['username']) ?></p> 
    <a href="?cerrar=1">Cerrar Sesión</a> 
    <div>
    <?php 
    foreach($notes as $note){

        //Crea una opcion por cada producto
        echo '<form action="../controller/notas.php" method="POST">
            <input type="hidden" name="id" value='.htmlspecialchars($note['NotaID']).'> 
            <p>'.htmlspecialchars($note['Fecha']).'</p>
            <textarea name="note" required>'.htmlspecialchars($note['Nota']).'</textarea> 
            <button type="submit" name="action" value="actualizar">Actualizar</button>
            <button type="submit" name="action" value="borrar">Borrar</button>
        </form>';
    }
    ?>
    </div>
</body>
</html>
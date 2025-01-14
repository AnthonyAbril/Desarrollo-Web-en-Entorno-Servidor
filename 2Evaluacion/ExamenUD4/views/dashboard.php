<?php 
session_start(); 
require_once '../models/note.php'; 
if (!isset($_SESSION['username'])) { 
    header('Location: login.php'); 
    exit; 
} 
if (isset($_GET['cerrar'])) { 
    session_destroy();
    header('Location: login.php'); 
    exit; 
} 
$notes = Note::getUserNotes($_SESSION['username']); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas - Mis notas</title>

    <style>
        form {
            position: relative;
        }
        button {
            width: 120px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            background-color: #556871;
            color: white;
            border: 0;
            cursor: pointer;
            position: absolute;
            bottom: 0;
        }
        textarea {
            margin-right: 10px;
            width: 400px;
            height: 150px;
        }
    </style>
</head> 
<body> 
    <h1>Mis notas</h1> 
    <p>Bienvenid@, <?= htmlspecialchars($_SESSION['username']) ?></p> 
    <a href="?cerrar=1">Cerrar Sesión</a> 
    <h2>Añadir Nota</h2> 
    <form action="../controllers/notes.php" method="POST"> 
        <textarea name="note" required></textarea> 
        <button type="submit">Agregar Nota</button> 
    </form> 
    <h2>Listado de notas</h2> 
    <ul> 
        <?php foreach ($notes as $note): ?> 
            <li><?= htmlspecialchars($note['content']) ?> - <?= $note['created_at'] ?></li> 
        <?php endforeach; ?> 
    </ul> 
</body> 
</html> 
 
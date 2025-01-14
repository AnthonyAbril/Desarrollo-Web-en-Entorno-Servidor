<?php 
session_start(); 
require_once '../models/note.php'; 
 
if (!isset($_SESSION['username'])) { 
    header('Location: ../views/login.php'); 
    exit; 
} 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['note'])) { 
        Note::addNote($_SESSION['username'], $_POST['note']); 
        header('Location: ../views/dashboard.php'); 
    } 
} 
?> 
 
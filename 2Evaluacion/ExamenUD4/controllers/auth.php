<?php 
session_start(); 
require_once '../models/user.php'; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['action']) && $_POST['action'] === 'register') { 
        if (User::register($_POST['username'], $_POST['password'])) { 
            header('Location: ../views/login.php'); 
        } else { 
            header('Location: ../views/register.php?error=1');
        } 
    } elseif (isset($_POST['action']) && $_POST['action'] === 'login') { 
        if (User::authenticate($_POST['username'], $_POST['password'])) { 
            $_SESSION['username'] = $_POST['username']; 
            if (isset($_POST['recordarme'])) { 
                setcookie('username', $_POST['username'], time() + 86400, '/','localhost'); 
            } else {
                setcookie('username', "", time()-60, '/','localhost');
            }
            header('Location: ../views/dashboard.php'); 
        } else { 
            header('Location: ../views/login.php?error=1');
        } 
    } 
} 
?> 

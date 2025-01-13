<?php

include "../model/conexionBD.php";
include "../model/user.php";

session_start();

if(isset($_POST['username'], $_POST['password']) && $_POST['username'] != '' && $_POST['password'] != ''){
    $user = user::verificarUsuario($_POST['username'], $_POST['password'])["UserID"];
    $notas = user::listarNotas($user);
}

if($user>0){
    include('../views/notas.php');
}else{
    include('../views/login.php');
}

?>

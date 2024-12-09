<?php

function conexion() {
    $mysqli_conexion = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");
    
    if ($mysqli_conexion->connect_errno) {
        echo "Error de conexión: " . $mysqli_conexion->connect_errno;
        exit;
    }
    
    return $mysqli_conexion;
}

?>
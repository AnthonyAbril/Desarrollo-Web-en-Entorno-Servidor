<?php

function conexion($consulta) {
    $mysqli_conexion = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");
    
    if ($mysqli_conexion->connect_errno) {
        echo "Error de conexión: " . $mysqli_conexion->connect_errno;
        exit;
    }
    
    // Ejecutamos la sentencia SQL
    return $mysqli_conexion->query($consulta);
}

?>
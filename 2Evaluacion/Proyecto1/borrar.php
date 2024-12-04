<?php
    //Conexion con la base
    include 'conexion.php';
    $conexion = conexion();
    
    // Recibimos los datos del formulario o método alternativo
    $nombre = $_POST["nombre"];

    //Creamos la sentencia SQL
    $ssql = "DELETE FROM clientes WHERE nombre='$nombre'";

    // Ejecutamos la sentencia de borrado
    if($conexion->query($ssql)) {
        echo '<p>Contacto borrado con éxito</p>';
    } else {
        echo '<p>Error al borrar el contacto: ' . $conexion->error . '</p>';
    }
?>
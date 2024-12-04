<?php
//Conexion con la base
    include 'conexion.php';
    $conexion = conexion();

    // Por ejemplo, recibimos los datos de un formulario enviado por POST
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    // Montamos la sentencia SQL
    $ssql = "UPDATE clientes SET telefono='$telefono' WHERE nombre='$nombre'";
    
    // Ejecutamos la sentencia de actualización
    if($conexion->query($ssql)) {
        echo '<p>Cliente actualizado con éxito</p>';
        echo $ssql;
    } else {
        echo '<p>Error al actualizar el cliente: ' . $conexion->error . '</p>';
    }
?>
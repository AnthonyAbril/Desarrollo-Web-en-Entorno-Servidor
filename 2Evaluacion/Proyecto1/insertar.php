<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include "conexion.php";
$conexion = conexion();

if ($_POST) {
    
    // Recuperamos los datos del formulario
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    
    // Componemos la sentencia SQL
    $ssql = "INSERT INTO clientes (nombre, telefono) VALUES ('$nombre', '$telefono')";
    
    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if ($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
        echo $ssql;
    } else {
        echo "<p>Hubo un error al ejecutar la sentencia de inserción: {$conexion->error}</p>";
    }
    
    // Cierra la conexion
    $conexion->close();
}

?>
</body>
</html>
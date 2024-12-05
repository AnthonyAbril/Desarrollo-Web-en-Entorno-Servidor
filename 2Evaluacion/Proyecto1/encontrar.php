<?php
    //Conexion con la base
    include 'conexion.php';
    $conexion = conexion();
    // Componemos la sentencia SQL
    $ssql = "SELECT * FROM productos";
    // Ejecutamos la sentencia SQL
    $result = $conexion->query($ssql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="productos" id="productos">
        <?php
            //recorre los registros
            while ($row = $result->fetch_array()) {
                echo '<option value="' . $row["id_producto"] . '">' . $row["nombre"] . '</option>';
            }
        ?>
    </select>
</body>
</html>
<?php
    //Conexion con la base
    include '../Modelo/conexion.php';
    // Componemos la sentencia SQL
    $result = conexion("SELECT * FROM productos ORDER BY nombre ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="mostrarVentas.php">
        <fieldset>
            <legend>Listado de Producto</legend>
            <select name="productos" id="productos">
                <?php
                    //recorre los registros
                    while ($row = $result->fetch_array()) {
                        echo '<option value="' . $row["id_producto"] . '">' . $row["nombre"] . '</option>';
                    }
                ?>
            </select>
            <button type="submit">Mostrar Ventas</button>
        </fieldset>
    </form>
</body>
</html>
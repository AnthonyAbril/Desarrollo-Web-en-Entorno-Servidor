<?php
    //Conexion con la base
    include 'conexion.php';
    $conexion = conexion();
    // Componemos la sentencia SQL
    $ssql = "SELECT * FROM clientes";
    // Ejecutamos la sentencia SQL
    $result = $conexion->query($ssql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Resultados Consulta</title>
</head>
<body>
    <h1>Resultados de una consulta a una BD</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>

        <?php
        //Mostramos los registros
        while ($row = $result->fetch_array()) {
        echo '<tr><td>' . $row["nombre"] . '</td>';
        echo '<td>' . $row["telefono"] . '</td></tr>';
        }
        ?>

    </table>
    </body>
</html>

<?php
    $result->free_result();
    $conexion->close();
?>
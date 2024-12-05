<?php
    //Conexion con la base
    include 'conexion.php';
    $conexion = conexion();
    
    // Recibimos los datos del formulario o método alternativo
    $productoSeleccionado = isset($_POST['productos']) ? $_POST['productos'] : '*';

    //Creamos la sentencia SQL
    $ssql = "SELECT `id_cliente`,`fecha` FROM `compras` WHERE `id_producto`=$productoSeleccionado";
    echo $ssql;

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
            <th>id cliente</th>
            <th>fecha</th>
        </tr>

        <?php
        //Mostramos los registros
        while ($row = $result->fetch_array()){
            echo '<tr><td>' . $row["id_cliente"] . '</td>';
            echo '<td>' . $row["fecha"] . '</td></tr>';
        }
        ?>

    </table>
    </body>
</html>

<?php
    $result->free_result();
    $conexion->close();
?>
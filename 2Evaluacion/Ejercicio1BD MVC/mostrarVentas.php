<?php
    //Conexion con la base
    include 'conexion.php';
    $conexion = conexion();
    
    // Recibimos los datos del formulario o método alternativo
    $productoSeleccionado = isset($_POST['productos']) ? $_POST['productos'] : '*';

    $ssql = "SELECT `compras`.id_cliente,`clientes`.nombre,`compras`.fecha 
    FROM `compras` 
    INNER JOIN `clientes` ON `compras`.id_cliente = `clientes`.id_cliente 
    WHERE `id_producto`=$productoSeleccionado 
    ORDER BY `id_cliente` ASC, `fecha` DESC";

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
    <h1>Listado de ventas del producto</h1>
    <table>
        <thead>
            <th>id cliente</th>
            <th>Nombre del cliente</th>
            <th>fecha</th>
        </thead>
        <tbody>
        <?php
            //Mostramos los registros
            while ($row = $result->fetch_array()) {
                echo '<tr><td>' . $row["id_cliente"] . '</td>';
                echo '<td>' . $row["nombre"] . '</td>' ;
                echo '<td>' . $row["fecha"] . '</td></tr>';
            }
        ?>
        </tbody>
    </table>
    </body>
</html>

<?php
    $result->free_result();
    $conexion->close();
?>
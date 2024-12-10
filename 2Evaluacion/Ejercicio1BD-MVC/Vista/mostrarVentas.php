<?php
    // Recibimos los datos del formulario o método alternativo
    $productoSeleccionado = isset($_POST['productos']) ? $_POST['productos'] : '*';

    $ventasProducto =  Ventas::listarVentas($productoSeleccionado);
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
            foreach ($ventasProducto as $venta) {
                echo '<tr><td>' . $venta["id_cliente"] . '</td>';
                echo '<td>' . $venta["nombre"] . '</td>' ;
                echo '<td>' . $venta["fecha"] . '</td></tr>';
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
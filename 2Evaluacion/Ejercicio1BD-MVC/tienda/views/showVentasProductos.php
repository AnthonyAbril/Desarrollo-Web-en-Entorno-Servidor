<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar ventas por producto</title>
    <script src="../js/formularios.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Lista de Ventas por Producto</h1>
    <form action="" method="post" id="form_select_product">
        <label for="producto"></label>
        <select name="producto" id="producto" onchange="submitOnChange('form_select_product')">
            <option value="">Seleccione un producto</option>
            <?php
            foreach($productos as $producto){
                $selected = ($producto['id_producto']==$productoSeleccionado)?"selected":"";
                echo '<option value="' . $producto['id_producto'] . '" '. $selected . '>' . $producto['nombre'] . '</option>';
            }
            ?>
        </select>
    </form>

    <?php
    if (count($ventasProducto)>0) {
    ?>
        <table>
            <tr>
                <th>Cliente</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            <?php
            foreach($ventasProducto as $venta) {
                echo "<tr>" .
                        "<td>" . $venta['cliente'] . "</td>" .
                        "<td>" . $venta['cantidad'] . "</td>" .
                        "<td>" . formateaFechaBD($venta['fecha']) . "</td>" .
                    "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>
</body>
</html>
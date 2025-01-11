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

        <!-- SELECTOR DE PRODUCTOS -->
        <select name="producto" id="producto" onchange="submitOnChange('form_select_product')">

            <option value="">Seleccione un producto</option><!-- opcion por defecto -->
            <?php
            // Recorre los productos
            foreach($productos as $producto){
                //si el producto ha sido seleccionado en el POST (al enviar la peticion) lo guarda para dejarlo seleccionado
                $selected = ($producto['id_producto']==$productoSeleccionado)?"selected":"";

                //Crea una opcion por cada producto
                echo '<option value="' . $producto['id_producto'] . '" '. $selected . '>' . $producto['nombre'] . '</option>';
            }
            ?>
        </select>
    </form>

    <?php
    //si hay alguna vevnta del producto seleccionado (y si hay producto seleccionado)
    if (count($ventasProducto)>0) {
        //se crea una tabla con la lista de sus ventas
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
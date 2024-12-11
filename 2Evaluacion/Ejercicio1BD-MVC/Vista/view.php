<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>Listado de Producto</legend>
            <select name="productos" id="productos">
                <?php
                    //recorre los registros
                    foreach ($productos as $producto) {
                        echo '<option value="' . $productos["id_producto"] . '">' . $productos["nombre"] . '</option>';
                    }
                ?>
            </select>
            <button type="submit">Mostrar Ventas</button>
        </fieldset>
    </form>

    <?php
    if(count($productos)>0){
    ?>
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
    <?php
    }
    ?>
</body>
</html>
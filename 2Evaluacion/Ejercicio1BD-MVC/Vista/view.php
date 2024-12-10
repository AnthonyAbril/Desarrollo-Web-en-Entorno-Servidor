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
                    foreach ($productos as $producto) {
                        echo '<option value="' . $productos["id_producto"] . '">' . $productos["nombre"] . '</option>';
                    }
                ?>
            </select>
            <button type="submit">Mostrar Ventas</button>
        </fieldset>
    </form>
</body>
</html>
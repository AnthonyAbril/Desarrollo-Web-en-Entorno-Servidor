<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio mostrar elementos</title>
    <style>
        table, tr, td, th {
            border: 1px solid; 
            padding: 10px;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Listando objetos de la base de datos</h1>   


    <!-- 2. El visor emplea el arreglo $productos para iterar sobre el y poder rellenar el desplegable del select -->


    <form action="../controlador/c_compras.php" method="POST">
        <select id="objetos" name="producto">
            <?php
                foreach ($productos as $producto) {
                    echo '<option '.($id_producto==$producto['id_producto']? "selected ": ""). 'value="' . $producto['id_producto'] . '">' . $producto['nombre'] . '</option>';
                }
            ?>
        </select>
        <input type="submit">
    </form>

    <!-- Una vez el post ya esta enviado, el controlador ya sabe cual es el item sobre el cual se quiere el historial de ventas -->
    


    <!-- 6. Comprobamos si el dato no esta devueto por algun casual vacio, y de esta manera ya podemos empezar a iterar en este dato para generar una tabla con
    los datos que queremos mostrar -->
    <?php
    if (isset($compras) && count($compras) > 0) {
    ?>
    <table>
    <tr>
        <th>nombre</th>
        <th>fecha</th>
        <th>id_compra</th>
    </tr>
    <?php

    foreach ($compras as $compra) {
        echo '<tr><td>' . $compra["nombre"] . '</td>';
        echo '<td>' . $compra["fecha"] . '</td>';
        echo '<td>' . $compra["id_compra"] . '</td></tr>'; 
    }
    ?>    
    </table>
    <?php
    }
    ?>
    
</body>
</html>
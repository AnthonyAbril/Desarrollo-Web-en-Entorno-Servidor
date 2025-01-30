<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo AJAX</title>
    <script src="../js/AJAX.js"></script>
</head>
<body onload="cargar();">
    <!--
        La funcionalidad sera la siguiente:

        Al escribir algo en el input (onchange) este enviara los datos a AJAX.js
        y este enviara la peticion al controlador para que el controlador
        use la funcion del modelo que hace la consulta a la base de datos.
        El controlador hace echo de esta respuesta y AJAX la captura
        mostrandolo finalmente en div de id=panel
    -->
    <form action="" id="f_clientes" method="POST" >
        <label>Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <button id="btn" onclick="cargar()">Buscar</button>
    </form>
    <table id="panel"></table>
</body>
</html>
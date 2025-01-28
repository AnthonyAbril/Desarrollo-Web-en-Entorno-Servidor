<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Insertar un registro</h1>
    <form method="POST" action="../controlador/c_insertarClientes.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono"><br><br>
        <input type="submit" value="Insertar">
    </form>
    <hr>

</body>
</html>
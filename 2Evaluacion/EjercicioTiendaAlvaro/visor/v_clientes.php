<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 10px ;
        }
    </style>
</head>
<body>
    <h1>Admninistracion de clientes</h1>


    <table>
        <thead>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Telefono</td>
            <td>id</td>
        </thead>
        <tbody>
        <?php
        foreach ($arrayClientes as $cliente) {
            echo '<tr>';
            echo '<td>'.$cliente['Nombre'].'</td>';
            echo '<td>'.$cliente['Apellidos'].'</td>';
            echo '<td>'.$cliente['Telefono'].'</td>';
            echo '<td>'.$cliente['Id'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <br><br>

    <form method="POST" action="../controlador/c_clientes.php">
        
        <label for="nombre">Nombre</label>
        <input type="text" required><br><br>
        <label for="apellidos">Apellidos</label>
        <input type="text" required><br><br>
        <label for="telefono">Telefono</label>
        <input type="text" required><br><br>
    </form>
</body>
</html>
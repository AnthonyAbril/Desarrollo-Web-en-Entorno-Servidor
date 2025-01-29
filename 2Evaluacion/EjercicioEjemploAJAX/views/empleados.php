
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
<br>
<?php
    echo "Bienvenido ".$_SESSION['username'];
?> 

<!-- cierra sesion y sale -->
<a href="?cerrar=1">Cerrar Sesión</a> 

<fieldset>
    <caption>-CONSULTAR-</caption>

    <form action="" method="POST">
        <label>Empleado a buscar: </label>
        
        <select name="empleadoID">
            <!-- recorre los empleados y los pone como seleccionables -->
            <?php foreach ($empleados as $e): ?> 
            <option value="<?= htmlspecialchars($e['id']) ?>">
                <?= $e['nombre'] ?>
            </option>
            <?php endforeach; ?> 
        
        </select>
        <input type="submit" name="action" value="consultar">
    </form>

    <?php if($empleado) {?>
        <!-- si se ha elegido el empleado se muestran sus datos -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Salario</th>
                <th>Fecha de Contratación</th>
                <th>Puesto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $empleado['id'] ?></td>
                    <td><?= $empleado['nombre'] ?></td>
                    <td><?= $empleado['apellido'] ?></td>
                    <td><?= $empleado['salario'] ?></td>
                    <td><?= $empleado['fecha_contratacion'] ?></td>
                    <td><?= $empleado['puesto'] ?></td>
                    <td>
                        <form action="" method="POST">
                            <input hidden name="empleadoIDElim" value="<?= htmlspecialchars($empleado['id'])?>">
                            <input type="submit" name="action" value="eliminar">
                        </form>
                    </td>
                </tr>
        </tbody>
    </table>
    <?php } ?>
</fieldset>
<br>
<fieldset>
    <caption>-INSERTAR-</caption>
    <form action="" method="POST">
        <label>Nombre: </label>
        <input type="text" name="empleadoNom">
        <br>
        <label>Apellido: </label>
        <input type="text" name="empleadoApe">
        <br>
        <label>Saldo: </label>
        <input type="number" name="empleadoSal" required>
        <br>
        <label>Puesto: </label>
        <select name="empleadoPue" required>
            <option value="Desarrollador">Desarrollador</option>
            <option value="Gerente">Gerente</option>
            <option value="Soporte Técnico">Soporte Técnico</option>
        </select>
        <br>
        <input type="submit" name="action" value="insertar">
    </form>
</fieldset>
<br>

<fieldset>
    <caption>-Actualizar-</caption>
    <form action="" method="POST">

    <!-- recorre empleados a actualizar y los pone como seleccionables -->
            <select name="empleadoIDAct">
            <?php foreach ($empleados as $empleado): ?> 
                <option value="<?= htmlspecialchars($empleado['id']) ?>">
                    <?= $empleado['nombre'] ?>
                </option>
            <?php endforeach; ?> 
            </select>

        <br>

        <input type="hidden" name="action" value="actualizar"> 
        <label>Nombre: </label>
        <input type="text" name="empleadoNom" required>
        <br>
        <label>Apellido: </label>
        <input type="text" name="empleadoApe" required>
        <br>
        <label>Saldo: </label>
        <input type="number" name="empleadoSal" required>
        <br>
        <label>Puesto: </label>
        <select name="empleadoPue" required>
            <option value="Desarrollador">Desarrollador</option>
            <option value="Gerente">Gerente</option>
            <option value="Soporte Técnico">Soporte Técnico</option>
        </select>
        <br>
        <input type="submit">
    </form>
</fieldset>
</body>
</html>
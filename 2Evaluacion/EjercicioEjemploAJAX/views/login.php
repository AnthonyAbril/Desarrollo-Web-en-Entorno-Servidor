<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../controller/auth.php" method="POST">
        <label>Username</label>
        <input type="text" name="username">
        <br>
        <label>Password</label>
        <input type="text" name="password">
        <br>
        <input type="submit">
    </form>

    <!-- error obtenido por get -->
    <div class="error">
    <?php
        if(isset($_GET['error']) && $_GET['error']==1){
            echo '<p>Contraseña o Usuario incorrecto</p>';
        }
    ?>
    </div>
</body>
</html>

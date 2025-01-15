<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="../controller/auth.php" method="POST">
        <input type="hidden" name="action" value="register"> 
        <label>Username</label>
        <input type="text" name="username">
        <br>
        <label>Password</label>
        <input type="text" name="password">
        <br>
        <input type="submit">
    </form>

    <a href="?form=login">Login</a>

    <div class="error">
    <?php
        if(isset($_GET['error']) && $_GET['error']==1){
            echo '<p>Esta cuenta ya existe</p>';
        }
    ?>
    </div>
</body>
</html>

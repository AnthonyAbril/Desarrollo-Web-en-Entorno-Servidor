<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas</title>
</head>
<body>
    <ul>
    <?php 
    foreach($notas as $nota){

        //Crea una opcion por cada producto
        echo '<li>'.$nota['Nota'].'</li>';
    }
    ?>
    </ul>
</body>
</html>
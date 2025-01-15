<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas</title>
</head>
<style>
    button{
        background-color: #ffdb9a96;
        border: none;
        margin-top: 5px;
        border-radius: 5px;
        padding: 5px 0;
    }

    div{
        width: 100%; /* Puedes ajustarlo a un ancho específico, como 600px */
        height: 80vh;
        display: flex;
        overflow-x: auto; /* Habilita desplazamiento horizontal */
        align-items: center;
    }

    form{
        background-color: orange;
        width: 300px;
        height: 70vh;
        display: flex;
        flex-direction: column;
        padding: 10px;
        border-radius: 10px;
        margin: 5px;
    }

    textarea{
        width: 300px;
        height: fit-content;
        height: 100%;
    }

    .sumar{
        width: 100px;
        height: 100px;
    }
    .sumar button{
        width: 100px;
        height: 100px;
        font-size: 50px;
    }
</style>
<body>
    <h1>Bienvenid@, <?= htmlspecialchars($_SESSION['username']) . htmlspecialchars($_SESSION['userid'])?></h1> 
    <a href="?cerrar=1">Cerrar Sesión</a> 
    <div>
    <?php 
    foreach($notes as $note){

        //Crea una opcion por cada producto
        echo '<form action="../controller/notas.php" method="POST">
            <input type="hidden" name="id" value='.htmlspecialchars($note['NotaID']).'> 
            <p>'.htmlspecialchars($note['Fecha']).'</p>
            <textarea name="note">'.htmlspecialchars($note['Nota']).'</textarea> 
            <button type="submit" name="action" value="actualizar">Actualizar</button>
            <button type="submit" name="action" value="borrar">Borrar</button>
        </form>';
    }

    //Boton de añadir nota
    echo '<form action="../controller/notas.php" method="POST" class="sumar">
        <button type="submit" name="action" value="añadir">+</button>
    </form>';
    ?>
    </div>
</body>
</html>
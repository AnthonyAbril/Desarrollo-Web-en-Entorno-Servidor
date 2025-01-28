<?php
    include "../modelo/Tienda.php";

    $tienda = new Tienda();
    

    if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"])) {

        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];

        $tienda->meterClientes($nombre, $apellidos, $telefono);

    } else {
        echo "faltaba alguno de los datos pertinentes";
    }
    
    include '../visor/v_insertarClientes.php';
?>
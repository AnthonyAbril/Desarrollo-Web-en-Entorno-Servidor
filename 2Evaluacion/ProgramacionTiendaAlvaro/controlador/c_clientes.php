<?php
include '../modelo/Tienda.php';

$tienda = new Tienda();

$arrayClientes = $tienda->obtenerClientes();
$arrayIdes = $tienda->obtenerId();

if (isset($_POST['ides'])) {

    if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['telefono'])) {

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $id = $_POST['ides'];

        $tienda->actualizarClientes($id, $nombre, $apellidos, $telefono);

    } else {

        $tienda->deleteClientes();
    }

}

include '../visor/v_clientes.php';
?>
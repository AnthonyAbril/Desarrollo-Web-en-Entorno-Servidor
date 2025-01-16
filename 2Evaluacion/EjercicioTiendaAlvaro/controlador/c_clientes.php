<?php
include '../modelo/Tienda.php';

$tienda = new Tienda();

$arrayClientes = $tienda->obtenerClientes();




include '../visor/v_clientes.php';
?>
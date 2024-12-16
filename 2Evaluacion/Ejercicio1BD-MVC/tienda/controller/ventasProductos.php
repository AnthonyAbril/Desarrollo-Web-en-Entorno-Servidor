<?php
include ('../inc/funciones.php');
include('../model/producto.php');

$productos = producto::listarProductos();
$ventasProducto = [];
$productoSeleccionado = "";

if(isset($_POST['producto']) && $_POST['producto']!="") {
    $productoSeleccionado = $_POST['producto'];
    $ventasProducto = producto::seleccionaVentasProducto($productoSeleccionado);
}

include('../views/showVentasProductos.php');

?>
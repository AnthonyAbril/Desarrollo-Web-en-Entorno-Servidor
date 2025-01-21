<?php
include("../Modelo/producto.php");
include("../Modelo/ventas.php");

//codigo para gestiones necesarias
$productos = Producto::listarProductos();
$ventasProducto = [];
$productoSeleccionado = "";

if(isset($_POST['productos'])){
    $productoSeleccionado = $_POST['productos'];

    $ventasProducto =  Ventas::listarVentas($productoSeleccionado);
}

include("../Vista/view.php");

?>
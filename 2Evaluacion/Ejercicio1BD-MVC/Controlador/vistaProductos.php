<?php
echo "inicia pagina<br>";
include("../Modelo/db.php");
include("../Modelo/producto.php");
    include("../Modelo/ventas.php");
echo "modelo incluido<br>";

//codigo para gestiones necesarias
$productos = producto::listarProductos();
$ventasProducto = [];
$productoSeleccionado = "";

echo "productos sacados<br>";

if(isset($_POST['productos'])){
    $productoSeleccionado = $_POST['productos'];

    $ventasProducto =  Ventas::listarVentas($productoSeleccionado);
}

include("../Vista/view.php");
echo "vista agregada<br>";

?>
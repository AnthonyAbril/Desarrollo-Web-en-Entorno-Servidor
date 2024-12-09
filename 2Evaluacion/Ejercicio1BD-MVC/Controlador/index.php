<?php
include("../Modelo/conexion.php");

//codigo para gestiones necesarias
$productos = producto::listarProductos();

include("../Vista/view.php");

?>
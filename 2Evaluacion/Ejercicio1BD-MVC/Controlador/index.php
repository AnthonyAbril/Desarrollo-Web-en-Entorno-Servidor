<?php
echo "inicia pagina";
include("../Modelo/db.php");
include("../Modelo/producto.php");
include("../Modelo/ventas.php");
echo "modelo incluido";

//codigo para gestiones necesarias
$productos = producto::listarProductos();
echo "productos sacados";

include("../Vista/view.php");
echo "vista agregada";

?>
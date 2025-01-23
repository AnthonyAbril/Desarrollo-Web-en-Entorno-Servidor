<?php
/*

Combina todos los archivos (vista y modelo ademas de otros) y compone la pagina web
controlando los archivos necesarios

*/

include ('../inc/funciones.php');   //incluye las funciones extras necesarias
include('../model/producto.php');   //incluye la clase producto 

$productos = producto::listarProductos();   //Recibe un array de todos los productos de la BBDD (CONEXION)
$ventasProducto = [];   //Array para guardar las ventas del producto
$productoSeleccionado = "";     //Puntero para seleccionar productos


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //si hay un _POST[producto] y no esta vacio (si se ha enviado algo desde el formulario, es decir, escogido un producto)
    if(isset($_POST['producto']) && $_POST['producto']!="") {
        $productoSeleccionado = $_POST['producto'];     //se selecciona el producto del POST 
        $ventasProducto = producto::seleccionaVentasProducto($productoSeleccionado);    //se saca de la BBDD las ventas del producto seleccionado (CONEXION)

        // Devolver las compras como JSON
        header('Content-Type: application/json');
        echo json_encode($ventasProducto);
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Falta el ID del cliente."]);
    }
    exit;
}

include('../views/showVentasProductos.php');
?>
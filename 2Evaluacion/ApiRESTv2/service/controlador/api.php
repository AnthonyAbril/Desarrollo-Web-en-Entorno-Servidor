<?php

include '../modelo/Producto.php';

// $request = $_SERVER['REQUEST_METHOD'];

// switch ($request) {

//     case 'GET':






// }

// $conexion = Db::conectar();

// $url = "https://example.com/api/v1/resource?param=value";

// // Descomponer la URL
// $parsedUrl = parse_url($url);

// // Obtener la parte de la API
// $apiPart = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';

// echo "La parte de la API es: " . $apiPart;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $uri = $_SERVER['REQUEST_URI'];

    $partes = explode('/', $uri);
    $id = $partes[count($partes)-1];

    if ($id == "api.php") {

        echo Producto::getAllProducts();

    } else {

        echo Producto::getProduct($id);
    }
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = file_get_contents("php://input");
    echo Producto::insertProduct($body);

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    $body = file_get_contents("php://input");
    
    $objetoJson = json_decode($body);

    echo Producto::updateProduct($objetoJson->id_producto, $objetoJson->descripcion, $objetoJson->precio, $objetoJson->nombre);
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'PATCH') {

    $body = file_get_contents("php://input");
    
    $objetoJson = json_decode($body);

    echo Producto::updatePartProduct($objetoJson->id_producto, $objetoJson->descripcion, $objetoJson->precio);

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $body = file_get_contents("php://input");
    echo Producto::deleteProducts($body);

} else {
    // Otro tipo de solicitud
    echo "Otro tipo de petición";
}



?>
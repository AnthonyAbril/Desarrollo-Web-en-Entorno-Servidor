<?php

include './Producto.php';

// $conexion = Db::conectar();

// $url = "https://example.com/api/v1/resource?param=value";

// // Descomponer la URL
// $parsedUrl = parse_url($url);

// // Obtener la parte de la API
// $apiPart = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';

// echo "La parte de la API es: " . $apiPart;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $uri = $_SERVER['REQUEST_URI'];
    echo $uri;
    $uri = strtoupper($uri);

    if ($uri == '/CLASE/DWES/APIREST/API.PHP') {

        echo Producto::getAllProducts();

    } else {

        $partes = explode('/', $uri);
        $id = $partes[count($partes)-1];
        echo Producto::getProduct($id);
    }
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = file_get_contents("php://input");
    echo Producto::insertProduct($body);

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {



    // La solicitud es un PUT
    echo "La petición es un PUT";
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $body = file_get_contents("php://input");
    echo Producto::deleteProducts($body);

} else {
    // Otro tipo de solicitud
    echo "Otro tipo de petición";
}



?>
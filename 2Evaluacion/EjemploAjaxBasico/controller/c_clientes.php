<?php

include_once "../model/m_clientes.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Extrae solo el path
    $partes = explode('/', trim($uri, '/')); // Divide en partes y limpia "/"
    $id = isset($_GET['id']) ? $_GET['id'] : null; // Obtener el 'id' de los parámetros GET

    try {
        if ($id) {
            // Si se proporciona un id, obtener un cliente específico
            echo json_encode(Clientes::ObtenerClientes($id));
        } else {
            // Si no se proporciona un id, obtener todos los clientes
            echo json_encode(Clientes::ObtenerClientes());
        }
    } catch (Exception $e) {
        echo json_encode(["error" => "Error al procesar la solicitud", "message" => $e->getMessage()]);
    }


    exit;

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    if (!$data) {
        http_response_code(400);
        echo json_encode(["error" => "Datos inválidos"]);
        exit;
    }

    $resultado = Clientes::InsertarCliente($data);

    if ($resultado) {
        http_response_code(201); // 201 Created
        echo json_encode(["mensaje" => "Cliente insertado correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo insertar el cliente"]);
    }

    exit;

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    // Obtener ID de la URL en lugar de `php://input`
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$id) {
        http_response_code(400);
        echo json_encode(["error" => "ID requerido para eliminar"]);
        exit;
    }

    $resultado = Clientes::BorrarCliente($id);

    if ($resultado) {
        http_response_code(200);
        echo json_encode(["mensaje" => "Cliente eliminado correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo eliminar el cliente"]);
    }

    exit;
}

?>

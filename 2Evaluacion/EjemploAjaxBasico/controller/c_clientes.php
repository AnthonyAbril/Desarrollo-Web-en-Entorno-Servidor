<?php

include_once "../model/m_clientes.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = file_get_contents("php://input");
    echo Producto::insertProduct($body);
    exit;
}

include_once "../views/v_general.php";

?>
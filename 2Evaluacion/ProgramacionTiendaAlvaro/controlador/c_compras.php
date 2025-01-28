<?php
    include __DIR__ . '/../modelo/Tienda.php';

    $tienda = new Tienda();
    $productos = $tienda->obtenerObjetos();

    if(isset($_POST['producto'])) {
        
        $id_producto = $_POST['producto'];
        $compras = $tienda->obtenerHistorialCompra($id_producto);
    }

   
    include __DIR__ . '/../visor/v_listarCompras.php';

?>

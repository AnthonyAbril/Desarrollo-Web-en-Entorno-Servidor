<?php
    include __DIR__ . '/../modelo/Tienda.php';
    
    El controlador, al incluir tanto la tienda como el visor, es como una pagina intermedia donde el codigo podria ser unificado como uno
    Asi pues, paso 1. El controlador hace una instancia de la clase de Tienda, y recoge el array del metodo obtener objetos.
    Al estar la vista incluida en esta pagina, es como si tuviera acceso a los datos que el controlador recoge, como $productos.

    $tienda = new Tienda();
    $productos = $tienda->obtenerObjetos();

    3. Se recoge por post el dato producto, este corresponde al id de un producto, y se usa como parametro de entrada sobre una query que requiere
    solo de saber el id de un item para darte la fecha de su venta y el nombre de comprador

    if(isset($_POST['producto'])) {
        
        $id_producto = $_POST['producto'];
        $compras = $tienda->obtenerHistorialCompra($id_producto);
    }

    5. Como ya hemos llamado a obtenerHistorialCompra y hemos alojado el resultado en $compras, como literalmente la vista esta abajo.
    La vista tiene este dato disponible, ya que esta como si fuera un archivo de java, abajo, y puede acceder a este dato.

    include __DIR__ . '/../visor/v_listarCompras.php';

?>

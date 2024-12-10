<?php

class Ventas{
    public static function listarVentas($productoSeleccionado){
        $db = new Db();  // Creamos un objeto para usar nuestra capa de abstracción

        // Conectamos con la BD a través de nuestra capa de abstracción
        $db->createConnection("172.0.0.1","phpmyadmin","1234","tienda");

        // Lanzamos la consulta a través de nuestra capa de abstracción.
        // Nos devolverá directamente un array estándar de PHP.
        $ventas = $db->dataQuery("SELECT `compras`.id_cliente,`clientes`.nombre,`compras`.fecha 
        FROM `compras` 
        INNER JOIN `clientes` ON `compras`.id_cliente = `clientes`.id_cliente 
        WHERE `id_producto`=$productoSeleccionado
        ORDER BY `id_cliente` ASC, `fecha` DESC");

        // Cerramos la conexión con la BD
        $db->closeConnection();

        return $ventas;
    }
}

?>
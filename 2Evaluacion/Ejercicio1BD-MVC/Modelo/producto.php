<?php

class Producto{
    private int $id_producto;
    public string $nombre;
    public string $descripcion;
    public float $precio; 
    
    public static function listarProductos(){
        $db = new Db();  // Creamos un objeto para usar nuestra capa de abstracción

        $conexion = conexionBD::conectar();

        // Conectamos con la BD a través de nuestra capa de abstracción
        $db->createConnection("172.0.0.1","phpmyadmin","1234","tienda");

        // Lanzamos la consulta a través de nuestra capa de abstracción.
        // Nos devolverá directamente un array estándar de PHP.
        $productos = $db->dataQuery("SELECT * FROM productos ORDER BY nombre ASC");

        // Cerramos la conexión con la BD
        $db->closeConnection();

        return $productos;
    }
}

?>
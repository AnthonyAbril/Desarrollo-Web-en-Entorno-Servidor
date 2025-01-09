<?php

include_once "conexionBD.php";

class Producto {
    private int $id_producto;
    public string $nombre;
    public string $descripcion;
    public float $precio;

    //se usa solo si se crean instancias
    public function __construct(string $nombre, string $descripcion, float $precio, int $id_producto = null) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    //crea una conexion con la BBDD y extrae la lista de productos
    public static function listarProductos(){
        $conexion = conexionBD::conectar();

        //crea la consulta
        $sql = "SELECT id_producto, nombre FROM productos ORDER BY nombre";
        $resultado = $conexion->query($sql);

        if($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }

        conexionBD::cerrarConexion($conexion);
      
    }

    public static function seleccionaVentasProducto($producto) {
        $conexion = conexionBD::conectar();

        //crea la consulta
        $sql = "SELECT CL.nombre as cliente, C.cantidad as cantidad, C.fecha as fecha 
                FROM compras C 
                    LEFT JOIN clientes CL ON CL.id_cliente = C.id_cliente
                    LEFT JOIN productos P ON P.id_producto = C.id_producto
                WHERE C.id_producto = $producto
                ORDER BY CL.nombre ASC, C.fecha DESC;";
        
        //saca el resultado de la consulta y la guarda
        $resultado = $conexion->query($sql);

        //si ha obtenido resultado lo devuelve como array
        if($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }

        conexionBD::cerrarConexion($conexion);//al terminar cierra la conexion
    }



}

?>
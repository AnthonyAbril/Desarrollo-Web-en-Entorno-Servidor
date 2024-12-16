<?php

include_once "conexionBD.php";

class Producto {
    private int $id_producto;
    public string $nombre;
    public string $descripcion;
    public float $precio;

    public function __construct(string $nombre, string $descripcion, float $precio, int $id_producto = null) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public static function listarProductos(){
        $conexion = conexionBD::conectar();

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

        $sql = "SELECT CL.nombre as cliente, C.cantidad as cantidad, C.fecha as fecha 
                FROM compras C 
                    LEFT JOIN clientes CL ON CL.id_cliente = C.id_cliente
                    LEFT JOIN productos P ON P.id_producto = C.id_producto
                WHERE C.id_producto = $producto
                ORDER BY CL.nombre ASC, C.fecha DESC;";
                
        $resultado = $conexion->query($sql);

        if($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }

        conexionBD::cerrarConexion($conexion);
    }



}

?>
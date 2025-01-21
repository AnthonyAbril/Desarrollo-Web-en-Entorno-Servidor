<?php

include "conexionBD.php";

class Producto{
    private int $id_producto;
    public string $nombre;
    public string $descripcion;
    public float $precio; 
    
    public static function listarProductos(){
        $conexion = conexionBD::conectar();

        $sql = "SELECT * FROM productos ORDER BY nombre ASC";
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
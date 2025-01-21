<?php

class Ventas{
    public static function listarVentas($productoSeleccionado){
        
        $conexion = conexionBD::conectar();

        $sql = "SELECT `compras`.id_cliente,`clientes`.nombre,`compras`.fecha 
        FROM `compras` 
        INNER JOIN `clientes` ON `compras`.id_cliente = `clientes`.id_cliente 
        WHERE `id_producto`=$productoSeleccionado
        ORDER BY `id_cliente` ASC, `fecha` DESC";

        $resultado = $conexion->query($sql);

        // Cerramos la conexión con la BD
        conexionBD::cerrarConexion($conexion);

        if($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}

?>
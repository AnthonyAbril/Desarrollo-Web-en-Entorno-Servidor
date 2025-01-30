<?php

include_once "m_conexionDB.php";

class Clientes{

    public static function ObtenerClientes($nombre_cliente = null){

        $conexion = conexionBD::conectar();

        $sql = "select * from clientes ".($nombre_cliente?"where Nombre like '%$nombre_cliente%'":" ");

        $resultado = $conexion->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);

        conexionBD::cerrarConexion($conexion);
    }

    public static function BorrarCliente($id_cliente){
        $conexion = conexionBD::conectar();

        $sql = "DELETE FROM clientes WHERE `clientes`.`Id` = $id_cliente";

        $resultado = $conexion->query($sql);

        return [$resultado];

        conexionBD::cerrarConexion($conexion);
    }

    public static function InsertarCliente($cliente){
        $conexion = conexionBD::conectar();

        $sql = "INSERT INTO `clientes` (`Id`, `Nombre`, `Apellidos`, `Telefono`) VALUES (NULL, '".$cliente['nombre']."', '".$cliente['apellido'].".', '".$cliente['telefono']."');";

        //$sql = "INSERT INTO `clientes` (`Id`, `Nombre`, `Apellidos`, `Telefono`) VALUES (NULL, 'prueba1', 'prueba11', 'prueba1');";
        
        $respuesta = $conexion->query($sql);

        conexionBD::cerrarConexion($conexion);

        return $respuesta;
    }
}

?>
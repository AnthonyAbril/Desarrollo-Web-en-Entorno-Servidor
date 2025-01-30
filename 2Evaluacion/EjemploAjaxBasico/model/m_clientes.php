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

}

?>
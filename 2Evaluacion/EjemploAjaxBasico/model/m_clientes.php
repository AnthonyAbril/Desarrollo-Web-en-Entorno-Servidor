<?php

include_once "m_conexionDB.php";

class Clientes{

    function ObtenerClientes($id_cliente = null){

        $conexion = conexionBD::conectar();

        $sql = "select * from clientes";

        $resultado = $conexion->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);

        conexionBD::cerrarConexion($conexion);
    }

}

?>
<?php

include_once "m_conexionBD.php";

class Asignaturas{

    public static function ObtenerAsignaturas(){

        $conexion = ConexionBD::conectar();

        $sql = "SELECT * FROM `asignaturas`;";

        $resultado = $conexion->query($sql);

        $conexion->close();

        return $resultado->fetch_all(MYSQLI_ASSOC);

    }

}

?>
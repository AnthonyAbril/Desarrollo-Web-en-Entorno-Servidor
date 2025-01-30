<?php

include_once "m_conexionBD.php";

class Alumno{

    public static function ObtenerAlumnos($nia=null){

        $conexion = ConexionBD::conectar();

        $sql = "SELECT * FROM `alumnos`;";

        $resultado = $conexion->query($sql);

        $conexion->close();

        return $resultado->fetch_all(MYSQLI_ASSOC);

    }

}

?>
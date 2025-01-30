<?php

include_once "m_conexionBD.php";

class Matriculas{

    public static function ObtenerMatriculas(){
        //SELECT * FROM `matriculas` inner join `alumnos` on `alumnos`.`nia` = `matriculas`.`nia`
        $conexion = ConexionBD::conectar();

        $sql = "SELECT alumnos.nombre as nomalu, asignaturas.nombre, alumnos.apellidos, matriculas.año, matriculas.nia FROM `matriculas` left join `alumnos` on `alumnos`.`nia` = `matriculas`.`nia` left join `asignaturas` on `asignaturas`.`codigo` = `matriculas`.`codigo`;";

        $resultado = $conexion->query($sql);

        $conexion->close();

        return $resultado->fetch_all(MYSQLI_ASSOC);

    }

}

?>
<?php

include_once "m_conexionBD.php";

class Matriculas{

    public static function ObtenerMatriculas(){

        $conexion = ConexionBD::conectar();

        $sql = "SELECT alumnos.nombre as nomalu, asignaturas.nombre, alumnos.apellidos, matriculas.año, matriculas.nia FROM `matriculas` left join `alumnos` on `alumnos`.`nia` = `matriculas`.`nia` left join `asignaturas` on `asignaturas`.`codigo` = `matriculas`.`codigo`;";

        $resultado = $conexion->query($sql);

        $conexion->close();

        return $resultado->fetch_all(MYSQLI_ASSOC);

    }

    public static function InsertarMatricula($Matricula){

        $conexion = ConexionBD::conectar();

        $sql = "INSERT INTO `matriculas` (`nia`, `codigo`, `año`) VALUES (`".$Matricula['nia']."`, '".$Matricula['codigo']."', '".$Matricula['ano']."')`;";

        $resultado = $conexion->query($sql);

        $conexion->close();

        return $resultado;
    }

}

?>
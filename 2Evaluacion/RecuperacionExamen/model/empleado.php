<?php

include_once "conexionBD.php";

class Empleado {

    public static function consultarEmpleado($ID=null){
        //Consultar todos los empleados o un empleado específico por su ID.

        $conexion = conexionBD::conectar();

        if(!$ID){
            $sql = 'SELECT * FROM `empleados`';
        }else{
            $sql = 'SELECT * FROM `empleados` WHERE `id` = '.$ID;
        }


        $resultado = $conexion->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function insertarEmpleado($nombre,$apellido,$salario=0,$puesto){
        //Insertar un nuevo empleado en la base de datos.

        $conexion = conexionBD::conectar();

        $fecha = date("o-m-d");

        $sql = "INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `salario`, `fecha_contratacion`, `puesto`) VALUES (NULL, '$nombre', '$apellido', $salario, '$fecha', '$puesto')";

        $conexion->query($sql);
    }

    public static function actualizarEmpleado($ID, $nombre=null, $apellido=null, $salario=null, $puesto=null){
        //Actualizar los datos de un empleado.

        echo "-3-";

        $conexion = conexionBD::conectar();

        $sql = "UPDATE `empleados` 
        SET `nombre` = '$nombre', 
        `apellido` = '$apellido', 
        `salario` = $salario, 
        `puesto` = '$puesto'
        WHERE `empleados`.`id` = $ID;";

        $conexion->query($sql);
    }

    public static function eliminarEmopleado($ID){
        //Elimina empleado

        $conexion = conexionBD::conectar();

        $sql = 'DELETE FROM `empleados` WHERE `empleados`.`id` = '.$ID.';';
        
        $resultado = $conexion->query($sql);    //realiza la consulta

        $conexion->close();
    }
}
?>
<?php

class conexionBD {
    //datos para la conexion con la BBDD
    private static $hostname = "127.0.0.1";
    private static $password = "";//1234
    private static $user = "root";//phpmyadmin
    private static $database = "notas";

    public static function conectar(){
        try{
            $conexion = new mysqli(self::$hostname,self::$user,self::$password,self::$database);
        } catch (mysqli_sql_exception $error){
            echo "ERROR: ".$error->getMessage();
            die();
        }
        return $conexion;
    }

    public static function cerrarConexion($conexion){
        $conexion->close();
    }
}

?>
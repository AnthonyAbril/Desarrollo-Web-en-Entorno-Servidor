<?php

class conexionBD {
    //datos para la conexion con la BBDD
    private static $hostname = "127.0.0.1";
    private static $password = "";
    private static $user = "root";
    private static $database = "empresa_db";

    public static function conectar(){
        try{
            //establece conexion con los datos
            $conexion = new mysqli(self::$hostname,self::$user,self::$password,self::$database);
        } catch (mysqli_sql_exception $error){
            echo "ERROR: ".$error->getMessage();
            die();
        }
        return $conexion;   //devuelve la conexion
    }
}

?>
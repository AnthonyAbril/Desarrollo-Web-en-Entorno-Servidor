<?php

class ConexionBD{
    private static $hostname = "127.0.0.1";
    private static $username = "phpmyadmin";
    private static $password = "1234";
    private static $database = "instituto_db";

    public static function conectar(){
        $conexion = new mysqli(self::$hostname,self::$username,self::$password,self::$database);


        return $conexion;
    }
}

?>
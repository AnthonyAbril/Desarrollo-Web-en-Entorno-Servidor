<?php

class conexionBD{
    private static $hostname = "172.0.0.1";
    private static $database = "tienda";
    private static $user = "phpmyadmin";
    private static $password = "1234";
    private $conexion;

    public static function conectar(){
        try{
            $conexion = new mysqli(self::$hostname,self::$user,self::$password,self::$database);

            // Ejecutamos la sentencia SQL
            $result = $conexion->query("SELECT * FROM productos ORDER BY nombre ASC");

            // Convertimos la lista de artículos, que es un cursor de MySQL, en un array estándar de PHP
            $articles = array();
            while ($row = $result->fetch_array())  {
                $articles[] = $row;
            }

            $conexion->close();
            return $articles;

        }catch (PDOException $error){
            echo "Error" . $error->getMessage();
            die();
        }

        return $articles;
    }

    /*
    function conexion($consulta) {
        $mysqli_conexion = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");
        
        if ($mysqli_conexion->connect_errno) {
            echo "Error de conexión: " . $mysqli_conexion->connect_errno;
            exit;
        }
        
        // Ejecutamos la sentencia SQL
        $result = $mysqli_conexion->query($consulta);

        // Convertimos la lista de artículos, que es un cursor de MySQL, en un array estándar de PHP
        $articles = array();
        while ($row = $result->fetch_array())  {
            $articles[] = $row;
        }

        $mysqli_conexion->close();
    }
    */
}

?>
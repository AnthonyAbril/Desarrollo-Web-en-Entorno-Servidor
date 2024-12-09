<?php

class conexionBD{
    private $hostname = "172.0.0.1";
    private $database = "tienda";
    private $user = "phpmyadmin";
    private $password = "1234";

    public static function conectar(){
        $conexion = $this;
    }

    function conexion($consulta) {
        $mysqli_conexion = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");
        
        if ($mysqli_conexion->connect_errno) {
            echo "Error de conexión: " . $mysqli_conexion->connect_errno;
            exit;
        }
        
        // Ejecutamos la sentencia SQL
        return $mysqli_conexion->query($consulta);
    }
}



?>
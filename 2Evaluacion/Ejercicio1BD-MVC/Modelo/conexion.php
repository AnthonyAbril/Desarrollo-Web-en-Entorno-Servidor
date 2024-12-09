<?php

class conexionBD{
    private $hostname = "172.0.0.1";
    private $database = "tienda";
    private $user = "phpmyadmin";
    private $password = "1234";
    private $conexion;

    public static function conectar(){
        try{
            $this->conexion = new mysqli($hostname,$user,$password,$database);
        }catch (PDOException $error){
            echo "Error" . $error->getMessage();
            die();
        }

        return $this -> conexion;
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
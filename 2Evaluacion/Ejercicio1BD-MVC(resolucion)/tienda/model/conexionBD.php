<?php

class conexionBD {

    //datos para la conexion con la BBDD
    private static $hostname = "127.0.0.1";
    private static $database = "tienda";
    private static $user = "phpmyadmin";
    private static $password = "1234";

    public static function conectar(){
        try {
            //Hace una conexion a la base de datos
            $conexion = new mysqli(self::$hostname, self::$user, self::$password, self::$database);    
            
        } catch (mysqli_sql_exception $error) {
            //mensaje de error si no le permite
            echo "¡ERROR: !".$error->getMessage();
            die();//finaliza la funcion
            
        }
        
        return $conexion;//devuelve la conexion realizada
    }

    public static function cerrarConexion($conexion){
        $conexion->close();//cierra la conexion realizada
    }
}

?>
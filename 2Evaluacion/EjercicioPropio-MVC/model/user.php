<?php

include_once "conexionBD.php";

class User {
    private int $id_usuario;
    public string $nombre;
    public string $password;

    public static function crearCuenta($username,$pw){
        $conexion = conexionBD::conectar();

        $sql = "INSERT INTO `usuarios` (`Username`, `Password`) VALUES ('$username', '$pw');";

        $conexion->query($sql);    //realiza la consulta
        
        $conexion->close();
    }

    public static function verificarUsuario($username,$pw){
        $conexion = conexionBD::conectar();

        $sql = 'SELECT UserID FROM usuarios WHERE Username = "'.$username.'" AND Password = "'.$pw.'" LIMIT 1;';
        
        $resultado = $conexion->query($sql);//hace la consulta

        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);//la pasa a array
        
        $conexion->close();

        if(count($resultado)>0){
        //si encuentra un usuario con ese username y password (array vacio)
        
            $nid = $resultado[0]["UserID"]; //extrae su id
            
            return (int)$nid;//lo manda
        }

        return 0;//si no, manda 0
    }
}
?>
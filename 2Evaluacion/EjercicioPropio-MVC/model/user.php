<?php

include_once "conexionBD.php";

class User {
    private int $id_usuario;
    public string $nombre;
    public string $password;

    public static function listarNotas($UserID){
        $conexion = conexionBD::conectar();

        $sql = 'SELECT * FROM notas WHERE UserID = (select UserID from usuarios where Username = "'.$UserID.'");';
        echo $sql;
        $resultado = $conexion->query($sql);

        if($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public static function verificarUsuario($username,$pw){
        $conexion = conexionBD::conectar();
        $esValido = false;

        $sql = 'SELECT UserID FROM usuarios WHERE Username = "'.$username.'" AND Password = "'.$pw.'" LIMIT 1;';
        
        $resultado = $conexion->query($sql);
        
        if($resultado && $resultado->num_rows > 0) {

            return true;
        }

        return false;
    }
}
?>
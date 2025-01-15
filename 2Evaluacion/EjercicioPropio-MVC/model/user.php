<?php

include_once "conexionBD.php";

class User {
    private int $id_usuario;
    public string $nombre;
    public string $password;

    public static function listarNotas($username){
        $conexion = conexionBD::conectar();

        $sql = 'SELECT * FROM notas WHERE UserID = (select UserID from usuarios where Username = "'.$username.'");';
        
        $resultado = $conexion->query($sql);

        if($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public static function crearCuenta($username,$pw){
        $conexion = conexionBD::conectar();

        $sql = "INSERT INTO `usuarios` (`Username`, `Password`) VALUES ('$username', '$pw');";

        $conexion->query($sql);
    }

    public static function verificarUsuario($username,$pw){
        $conexion = conexionBD::conectar();

        $sql = 'SELECT UserID FROM usuarios WHERE Username = "'.$username.'" AND Password = "'.$pw.'" LIMIT 1;';
        
        $resultado = $conexion->query($sql);

        $nid = $resultado->fetch_all(MYSQLI_ASSOC)[0]["UserID"];

        if($resultado && $resultado > 0) {

            return (int)$nid;
        }

        return 0;
    }

    public static function añadirNota($userID){
        $conexion = conexionBD::conectar();
        
        $sql = "INSERT INTO `notas` (`UserID`, `Nota`) VALUES ($userID, \"\");";
        echo $sql;
        $resultado = $conexion->query($sql);
    }

    public static function actualizarNota($note, $id){
        $conexion = conexionBD::conectar();

        $sql = 'UPDATE `notas` SET `Nota` = "'.$note.'" WHERE `notas`.`NotaID` = '.$id.';';

        $resultado = $conexion->query($sql);
    }

    public static function borrarNota($id){
        $conexion = conexionBD::conectar();

        $sql = 'DELETE FROM `notas` WHERE `notas`.`NotaID` = '.$id.';';
        echo $sql;
        $resultado = $conexion->query($sql);
    }
}
?>
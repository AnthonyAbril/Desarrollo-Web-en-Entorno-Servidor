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

    public static function verificarUsuario($username,$pw){
        $conexion = conexionBD::conectar();
        $esValido = false;

        $sql = 'SELECT UserID FROM usuarios WHERE Username = "'.$username.'" AND Password = "'.$pw.'" LIMIT 1;';
        
        $resultado = $conexion->query($sql);
        
        if($resultado && $resultado->num_rows > 0) {

            return $resultado;
        }

        return 0;
    }

    public static function añadirNota($userID, $note, $id){
        $conexion = conexionBD::conectar();

        $sql = 'INSERT INTO `notas` (`UserID`, `NotaID`, `Nota`, `Fecha`) VALUES ('.$userID.', '.$id.', '.$note.', CURRENT_TIMESTAMP);';

        $resultado = $conexion->query($sql);
    }

    public static function actualizarNota($note, $id){
        $conexion = conexionBD::conectar();

        $sql = 'UPDATE `notas` SET `Nota` = "'.$note.'" WHERE `notas`.`NotaID` = '.$id.';';

        $resultado = $conexion->query($sql);
    }
}
?>
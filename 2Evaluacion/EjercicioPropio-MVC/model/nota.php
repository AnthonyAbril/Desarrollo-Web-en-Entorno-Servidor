<?php

include_once "conexionBD.php";

class nota{

    public static function listarNotas($username){
        $conexion = conexionBD::conectar();

        $sql = 'SELECT * FROM notas WHERE UserID = (select UserID from usuarios where Username = "'.$username.'");';
        
        $resultado = $conexion->query($sql);    //realiza la consulta
        
        $conexion->close();

        if($resultado) {
        //si recibe resultado
            return $resultado->fetch_all(MYSQLI_ASSOC); //lo pasa a array y lo devuelve
        } else {
            return [];  //devuelve array vacio
        }
    }

    public static function añadirNota($userID){
        $conexion = conexionBD::conectar();
        
        $sql = "INSERT INTO `notas` (`UserID`, `Nota`) VALUES ($userID, \"\");";
        
        $resultado = $conexion->query($sql);    //realiza la consulta
        
        $conexion->close();
    }

    public static function actualizarNota($note, $id){
        $conexion = conexionBD::conectar();

        $sql = 'UPDATE `notas` SET `Nota` = "'.$note.'" WHERE `notas`.`NotaID` = '.$id.';';

        $resultado = $conexion->query($sql);    //realiza la consulta

        $conexion->close();
    }

    public static function borrarNota($id){
        $conexion = conexionBD::conectar();

        $sql = 'DELETE FROM `notas` WHERE `notas`.`NotaID` = '.$id.';';
        
        $resultado = $conexion->query($sql);    //realiza la consulta

        $conexion->close();
    }
}
?>
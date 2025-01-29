<?php

include_once "conexionBD.php";

class user {
    public static function verificarUsuario($username,$pw){
        $resultado = null;
        
        if($username=="a" && $pw=="1234"){
            $resultado = 1;
        }
        if($username=="Dios" && $pw=="123456"){
            $resultado = 2;
        }

        //pongo id para diferenciarlos y que solo dios pueda actualizar salarios pero no me ha dado tiempo a añadirlo

        /*
        administrador – 1234, Dios – 123456 puedan acceder al sistema.
        Tan sólo Dios podrá actualizar los salarios.
        */

        if($resultado>0){
            
            return $resultado;//lo manda
        }

        return 0;//si no, manda 0
    }
}
?>
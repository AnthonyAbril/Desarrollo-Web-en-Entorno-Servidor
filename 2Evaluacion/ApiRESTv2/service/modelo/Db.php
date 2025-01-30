<?php

//intentar hacer esta clase estatica
class Db {

    function conectar() {

        $conect = new mysqli("127.0.0.1", "root", "", "tienda");
    
        return $conect;
    }
}

?>
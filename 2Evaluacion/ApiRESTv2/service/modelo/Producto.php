<?php

include 'Db.php';

class Producto {

    static function getAllProducts() {  

        $db = new Db();
        $conexion = $db->conectar();

        $querySelect = "SELECT * FROM producto";
        
        $result = $conexion->query($querySelect);

        if ($result->num_rows > 0) {
            $rows = array();
            // Recorrer cada fila del resultado
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            // Devolver los datos en formato JSON
            return json_encode($rows);
        } else {
            return json_encode(array());
        }
    }

    static function getProduct($id) {  

        $db = new Db();
        $conexion = $db->conectar();

        $querySelect = "SELECT * FROM producto WHERE id_producto = $id";
        
        $result = $conexion->query($querySelect);

        if ($result->num_rows > 0) {
            $rows = array();
            // Recorrer cada fila del resultado
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            // Devolver los datos en formato JSON
            return json_encode($rows[0]);
        } else {
            return json_encode(array());
        }
    }


    static function insertProduct($json) {

        $db = new Db();
        $conexion = $db->conectar();

        //aqui deberia de haber una forma de sustraer los datos del json con un objeto

        $objetoJson = json_decode($json);

        $aJson = array();
        foreach ($objetoJson as $clave => $valor) {
            $aJson[] = $valor;
        }

        $queryInsert = "INSERT INTO producto(nombre, precio, descripcion) 
        VALUES('$aJson[0]', $aJson[1], '$aJson[2]')";

        $conexion->query($queryInsert);

        $conexion->close();

        return json_encode($aJson);
    }



    static function deleteProducts($id) {

        $db = new Db();

        $conexion = $db->conectar();

        $objetoJson = json_decode($id);
        $aJson = array();

        foreach ($objetoJson as $clave => $valor) {
            $aJson[] = $valor;
        }

        $queryDelete = "DELETE FROM producto WHERE id_producto = $aJson[0]";
        
        $conexion->query($queryDelete);

        $conexion->close();

        return json_encode($aJson[0]);
    }

    static function updatePartProducts($id, $descripcion, $precio) {

        $db = new Db();

        $conexion = $db->conectar();

        $queryPatch = "UPDATE producto SET precio = $precio, descripcion = '$descripcion'
        WHERE $id = id_producto";
        
        $conexion->query($queryPatch);

        $conexion->close();

        return Producto::getProduct($id);
    }

    static function updateProduct($id, $descripcion, $precio, $nombre) {

        $db = new Db();

        $conexion = $db->conectar();

        $queryPut = "UPDATE producto SET precio = $precio, descripcion = '$descripcion', nombre = '$nombre'
        WHERE $id = id_producto";
        
        $conexion->query($queryPut);

        $conexion->close();

        return Producto::getProduct($id);
    }

}

?>
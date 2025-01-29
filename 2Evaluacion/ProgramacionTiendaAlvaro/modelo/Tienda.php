<?php

class Tienda {

    function obtenerClientes() {

        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");

        $select = "SELECT * FROM clientes";
        $queryClientes = $conect->query($select);
        
        $arrayClientes = array();
        while ($row = $queryClientes->fetch_array()) {
            $arrayClientes[] = $row;
        }

        $conect->close();

        return $arrayClientes;
    }
    
    function obtenerId() {

        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");

        $select = "SELECT Id FROM clientes";
        $queryId = $conect->query($select);
        
        $arrayIdes = array();
        while ($row = $queryId->fetch_array()) {
            $arrayIdes[] = $row;
        }

        $conect->close();

        return $arrayIdes;

    }

    function actualizarClientes($id_cliente, $nombre, $apellidos, $telefono) {

        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");

        $update = "UPDATE clientes SET Nombre='$nombre', Apellidos='$apellidos', Telefono='$telefono' WHERE '$id_cliente'= Id";
        $conect->query($update);

        $conect->close();
    }

    function meterClientes($nombre, $apellidos, $telefono) {

        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");

        $insert = "INSERT INTO clientes(Nombre, Apellidos, Telefono) 
        VALUES('$nombre', '$apellidos', '$telefono')";
        
        $conect->query($insert);

        $conect->close();
    }

    function deleteClientes($id_cliente) {

        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");

        $queryDelete = "DELETE FROM clientes WHERE Id = '$id_cliente'";
        $conect->query($queryDelete);

        $conect->close();

    }
    

    function obtenerObjetos() {
    
        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");

        $select = "SELECT * FROM producto";
        $queryProductos = $conect->query($select);
        
        $arrayProductos = array();
        while ($row = $queryProductos->fetch_array()) {
            $arrayProductos[] = $row;
        }
    
        $conect->close();

        return $arrayProductos;
    
    }
    

    function obtenerHistorialCompra($id_producto) {

        $conect = new mysqli("127.0.0.1", "phpmyadmin", "1234", "tienda");
    
        $select = "SELECT clientes.nombre, compra.fecha, compra.id_compra
        FROM clientes
        JOIN compra ON clientes.Id = compra.id_cliente
        WHERE compra.id_producto = $id_producto
        ORDER BY clientes.nombre ASC, compra.fecha DESC";
        $queryCompra = $conect->query($select);
    
        $historialCompra = array();
        while ($row = $queryCompra->fetch_array()) {
            $historialCompra[] = $row;
        }
    
        $conect->close();

        return $historialCompra;
    }

}


?>
<?php

class Tienda {

    // private $conect;

    // function conectar() {
    //     $conect = new mysqli("127.0.0.1", "root", "", "tienda");
    
    //     if ($conect->connect_errno) {
    //         echo "Error de conexion ".$conect->connect_errno;
    //         return;
    //     } else {
    //         echo "chachi pistachi <br>";
    //     }
    
    //     return $conect;
    // }

    // function cerrar() {

    //     if ($this->conect) {
    //         $this->conect->close();
    //     } else {
    //         echo "there is no connection up";
    //     }

    // }

    function obtenerClientes() {

        $conect = new mysqli("127.0.0.1", "root", "", "tienda");

        $select = "SELECT * FROM clientes";
        $queryClientes = $conect->query($select);
        
        $arrayClientes = array();
        while ($row = $queryClientes->fetch_array()) {
            $arrayClientes[] = $row;
        }

        $conect->close();

        return $arrayClientes;
    }
    
    

    function obtenerObjetos() {
    
        $conect = new mysqli("127.0.0.1", "root", "", "tienda");

        $select = "SELECT * FROM producto";
        $queryProductos = $conect->query($select);
        
        $arrayProductos = array();
        while ($row = $queryProductos->fetch_array()) {
            $arrayProductos[] = $row;
        }
    
        $conect->close();

        return $arrayProductos;
    
    }
    
4. Como tenemos en el controlador un objeto de la clase tienda, podemos llamar a este metodo, como anteriormente.
    Dandose este caso, todos los metodos abren y cierran la conexion y devuelven un array.

    function obtenerHistorialCompra($id_producto) {

        $conect = new mysqli("127.0.0.1", "root", "", "tienda");
    
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
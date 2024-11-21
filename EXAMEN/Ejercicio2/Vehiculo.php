<?php

require_once ("Vehiculo.php");

abstract class Vehiculo{
    #atributos comunes
    public $marca,$modelo,$precio;
    public static $impuestoBase = 0.21;

    public function __construct($marca,$modelo,$precio){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precio = $precio;
    }

    public function calcularImpuesto(){
        #devuelve el valor base del impuesto.
        return ($this->precio*$this->impuestoBase);
    }

    function mostrarDetalles(){

        $detalles = "Marca: " + $this->marca
        + "\nModelo: " + $this->modelo
        + "\nPrecio: " +  $this->precio + "€";
        return $detalles;

    }
}

?>
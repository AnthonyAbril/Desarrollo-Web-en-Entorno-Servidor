<?php
class Coche extends Vehiculo{
    public float $cilindrada;

    public function __construct($marca,$modelo,$precio,$cilindrada){
        parent::__construct($marca, $modelo, $precio);
        $this->cilindrada;
    }

    function calcularImpuesto(){
        $impuestoAdicional = 150;
        if($this->cilindrada>2000){
            return parent::calcularImpuesto() + $impuestoAdicional;
        }else{
            return parent::calcularImpuesto();
        }
    }

    function mostrarDetalles(){

        $detalles = "Detalles del Coche:\n\n"
        + parent::mostrarDetalles()
        + "\nImpuesto: " + $this->calcularImpuesto() + "€"
        + "\nPrecio Total (con impuestos): " + ($this->calcularImpuesto()+$this->precio) + "€"
        + "\nCilindrada: " + $this->cilindrada + "cc";

        return $detalles;
    }

}
?>
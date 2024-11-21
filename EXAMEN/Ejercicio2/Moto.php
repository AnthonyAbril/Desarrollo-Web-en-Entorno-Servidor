<?php
    require_once "Vehiculo.php";

    class Moto extends Vehiculo{
        public bool $tieneSidecar;

        public function __construct($marca,$modelo,$precio,$tieneSidecar){
            parent::__construct($marca, $modelo, $precio);#llama al constructor padre
            $this->tieneSidecar;
        }

        function calcularImpuesto(){
            $impuestoAdicional = 50;
            if($this->tieneSidecar){
                return parent::calcularImpuesto() + $impuestoAdicional;#añade al impuesto base
            }
        }

        function mostrarDetalles(){
            #añade a los detalles
            $detalles = "Detalles de la Moto:\n\n"
            + parent::mostrarDetalles()
            + "\nImpuesto: " + $this->calcularImpuesto() + "€"
            + "\nPrecio Total (con impuestos): " + ($this->calcularImpuesto()+$this->precio) + "€"
            + "\n Tiene sidecar: : " + ($this->tieneSidecar)?"si":"no";

            return $detalles;
        }
    }
?>
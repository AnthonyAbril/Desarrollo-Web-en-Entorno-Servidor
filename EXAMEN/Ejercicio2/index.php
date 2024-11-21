<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php
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

        $coche1 = new Coche("Toyota","Corolla",25000,"2200");

        echo "<p>COCHES Y MOTOS EN STOCK</p>";
    ?>
</body>
</html>
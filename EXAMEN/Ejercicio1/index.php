<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        Calcula y muestra el área de tres conos con radios de 3, 8 y 9'5 mm y alturas de
        15, 21 y 6 mm respectivamente. Inserta los datos en un array asociativo. Pi será
        especificada como una constante de valor 3’1416.

        La fórmula para el área superficial A de un cono es:
            A=π⋅r⋅(r+l)
        Donde:
            r es el radio de la base del cono.
            l es la generatriz del cono, que se calcula utilizando el teorema de Pitágoras:
                𝑙 = √(𝑟2 + ℎ2)
        donde h es la altura del cono.

        
        La respuesta obtenida debe ser un HTML completo que muestre un resultado
        similar similar a:

        ÁREA DE LOS CONOS
        Área del cono1 (radio: 3 mm, altura: 15 mm): 141.37 mm²
        Área del cono2 (radio: 8 mm, altura: 21 mm): 888.52 mm²
        Área del cono3 (radio: 9.5 mm, altura: 6 mm): 336.71 mm²
    -->

    <?php
        $PI = 3.1416;

        #guardamos datos en array asociativo
        $a = array(
            "cono1" => array(3, 15),
            "cono2" => array(8, 21),
            "cono3" => array(9.5, 6),
        );

        #calcula area del cono
        function calcularArea($cono){
            global $PI;#accedemos a la variable global PI
            $radio = $cono[0];
            $altura = $cono[1];

            #formula: A=π⋅r⋅(r+l)
            $l = $radio + calculaGeneratriz($radio, $altura);
            $A = $PI * $radio * $l;
            return number_format($A,2);
        }

        #calcula la generatriz del cono en funcion del radio y la altura del cono
        function calculaGeneratriz($radio, $altura){
            #formula: 𝑙 = √(𝑟2 + ℎ2)
            $l = sqrt(pow($radio,2) + pow($altura,2));
            return $l;
        }

        #Mostrar resultados
        echo '<h1>ÁREA DE LOS CONOS</h1>';
        echo '<p>Área del cono1 (radio: 3 mm, altura: 15 mm): ', calcularArea($a["cono1"]), " mm²</p>";
        echo '<p>Área del cono2 (radio: 8 mm, altura: 21 mm): ', calcularArea($a["cono2"]), " mm²</p>";
        echo '<p>Área del cono3 (radio: 9.5 mm, altura: 6 mm): ', calcularArea($a["cono3"]), " mm²</p>";
    ?>
</body>
</html>
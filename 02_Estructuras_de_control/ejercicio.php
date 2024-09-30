<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio</title>

    <!-- Mostrar errores en la web -->
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    
</head>
<body>

    <h2>Ejercicio 01</h2>
    <p>MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:</p>
    <p>Viernes 27 de Septiembre de 2024</p>
    <p>UTILIZAR LAS ESTRUCTURAS DE CONTROL NECESARIAS.</p>
    <br>
    <?php

    $dia_escrito = date("l");
    $dia_escrito = match($dia_escrito) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "DOmingo"
    };

    $dia_numero = date("j");

    $mes = date("F");
    $mes = match($mes) {
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre",
     };

     $anio = date("Y");

     echo "<h4>$dia_escrito $dia_numero de $mes de $anio"

    ?>
    <hr><br>

    <h2>Ejercicio 02</h2>
    <p>MOSTRAR EN UNA LISTA LOS NÚMEROS MÚLTIPLOS DE 3 USANDO WHILE E IF ENTRE 1 Y 100</p>
    <br>
    <?php

    $i = 1;
    $multiplos = null;
    echo "<ul>";
    while ($i <= 100) {
        if (($i % 3) === 0){
            $multiplos .= "<li>$i</li>";
        }
        $i++;
    }
    echo "</ul>";

    echo "<p>Los multimos de 3 son: $multiplos</p>";

    ?>
    <hr><br>

    <h2>Ejercicio 03</h2>
    <p>CALCULAR LA SUMA DE LOS NÚMEROS PARES ENTRE 1 Y 20</p>
    <br>
    <?php

    $i = 1;
    $suma = null;

    while ($i <= 20) {
        if (($i % 2) === 0){
            $suma += $i;
        }
        $i++;
    }

    echo "<p>La suma es: $suma</p>";
    
    ?>
    <hr><br>

    <h2>Ejercicio 04</h2>
    <p>CALCULAR EL FACTORIAL DE 6 CON WHILE</p>
    <?php

    $i = 1;
    DEFINE("factorial", 6);
    $total_factorial = 1;

    while ($i <= factorial) {
        $total_factorial *= $i;
    $i++;
    }
    
    echo "<p>El factorial de " . factorial . " es: $total_factorial</p>";

    ?>
    <hr><br>

    <h2>Ejercicio 05</h2>
    <p>MUESTRA POR PANTALLA LOS 50 PRIMEROS NÚMEROS PRIMOS</p>
    <br>
    <?php

    $num = 2;
    $numerosPrimos = 0;

    echo "<ol>";
    while ($numerosPrimos < 50) {
        $es_mi_primo= true;
        for ($i = 2; $i < $num; $i++) {
            if (($num % $i) == 0) {
                $es_mi_primo = false;
                break;
            } 
        } 
        if ($es_mi_primo) {
            echo "<li>$num</li>";
            $numerosPrimos ++;
        }
        $num++;
    }
    echo "</ol>";

    //var_dump($es_mi_primo);
    ?>

</body>
</html>
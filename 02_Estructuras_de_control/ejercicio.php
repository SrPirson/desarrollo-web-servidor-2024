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

    <!-- 
        EJERCICIO 01:
        MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
            Viernes 27 de Septiembre de 2024
        UTILIZAR LAS ESTRUCTURAS DE CONTROL NECESARIAS.
    -->

    <h2>Ejercicio 01</h2>
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

    <!-- 
        EJERCICIO 02:
        MOSTRAR EN UNA LISTA LOS NÚMEROS MÚLTIPLOS DE 3 USANDO WHILE E IF
    -->
    <h2>Ejercicio 02</h2>
    <?php

    $i = 1;
    $multiplos = null;

    while ($i <= 100) {
        if (($i % 3) === 0){
            $multiplos .= "$i, ";
        }
        $i++;
    }

    echo "<p>Los multimos de 3 son: $multiplos</p>";

    ?>
    <hr><br>

    <!-- 
        EJERCICIO 03:
        CALCULAR LA SUMA DE LOS NÚMEROS PARES ENTRE 1 Y 20
    -->

    <h2>Ejercicio 03</h2>
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
    <!-- 
        EJERCICIO 04:
        CALCULAR EL FACTORIAL DE 6 CON WHILE
    -->

    <h2>Ejercicio 04</h2>
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
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>

    <!-- Mostrar errores en la web -->
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php

    /* 
    TODOS LOS ARRAYS EN PHP SON ASOCIATIVOS, COMO LOS MAP DE JAVA

    TIENEN PARES CLAVE-VALOR
    */

    $numeros = [2,3,4,6,7];
    $numeros = array(6,10,9,5,4);
    print_r($numeros); // PRINT RELATIONAL - Para imprimir un Array

    echo "<br><br>";

    $animales = ["Perro", "Gato", "Oso", "Koala", "Suricato"];
    $animales = [
        "A01" => "Perro",
        "A02" => "Gato",
        "A03" => "Suricato",
        "A04" => "Oso",
        "A05" => "Koala",
    ];

    print_r($animales);

    echo "<p>" . $animales["A05"] . "</p>";
    ?>


</body>
</html>
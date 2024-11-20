<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>

    <link rel="stylesheet" type="text/css" href="./css/estilos.css">

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

    print_r($animales);
    echo "<p>" . $animales[2] . "</p>";

    $animales[1] = "Elefante"; /* Sobreescribir un valor */
    echo "<p>" . $animales[1] . "</p>";

    /* Añadir al Array uno o más valores sin clave */
    array_push($animales, "Morsa", "Foca");
    $animales[] = "Ganso"; /* Lo mismo */

    print_r($animales);

    /* Elimina el valor de esa posición */
    unset($animales[1]);
    echo "<br><br>";
    print_r($animales);
    echo "<br><br>";

    /* Devuelve todos los valores del Array y lo indexa nuevamente.  */
    $animales = array_values($animales);
    print_r($animales);

    /* Para contar la cantidad de elementos de un Array */
    $cantidad_animales = count($animales);
    echo "<h4>Hay $cantidad_animales animales</h4>";

    /* Recorrer Array con un bucle */

    echo "<h4>Lista de animales (FOR)</h4>";
    echo "<ol>";
    for ($i = 0; $i < count($animales); $i++) {
        echo "<li>" . $animales[$i] . "</li>";
    }
    echo "</ol>";


    echo "<h4>Lista de animales (WHILE)</h4>";
    $i = 0;
    echo "<ol>";
    while ($i < count($animales)) {
        echo "<li>" . $animales[$i] . "</li>";
        $i++;
    }
    echo "</ol>";


    echo "______________________________________________________<br><br><br>";

    /* Array con ids asociativos */
    $animales = [
        "A01" => "Perro",
        "A02" => "Gato",
        "A03" => "Suricato",
        "A04" => "Oso",
        "A05" => "Koala",
    ];

    print_r($animales);

    echo "<p>" . $animales["A05"] . "</p>";

    echo "<br>______________________________________________________<br>";



    /* 
    
    CREAR EL ARRAY CON 3 COCHES
    AÑADIR 2 COCHES CON SUS MATRICULAS
    AÑADIR 1 COCHE SIN MATRICULA
    BORRAR EL COCHE SIN MATRICULA
    RESETEAR LAS CLAVES Y ALMACENAR EL RESULTADO EN OTRO ARRAY

    EJEMPLO: "4312 TDZ" => "Audi TT"

    */

    $coches = [
        "4312 TDZ" => "Audi TT",
        "7449 BTT" => "Chrysler Voyager",
        "4312 JJR" => "Mercedes-Benz CLA"
    ];

    $coches["7832 MTC"] = "Nissan GTR";
    $coches["1145 BJT"] = "Volkswagen Polo";

    $coches[] = "Nissan Micra";

    unset($coches[0]);

    $coches_locos = array_values($coches);

    print_r($coches_locos);
    
    /* foreach para recorrer arrays */
    echo "<h4>Lista de coches con FOREACH: sin clave</h4>";
    echo "<ol>";
    foreach($coches as $coche) {
        echo "<li>$coche</li>";
    }
    echo "</ol>";

    echo "<h4>Lista de coches con FOREACH: con clave</h4>";
    echo "<ul>";
    foreach($coches as $matricula => $coche) {
        echo "<li>$matricula => $coche</li>";
    }
    echo "</ul>";

    ?>


    <!-- FORMA 1 -->
    <table>
        <caption>Coches</caption>
        <thead>
            <tr>
                <th>Matrícula</th>                
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($coches as $matricula => $coche) {
                        echo "<tr>";
                            echo "<td>$matricula</td>";
                            echo "<td>$coche</td>";
                        echo "</tr>";
                    }
                ?>
        </tbody>
    </table>

    <!-- FORMA 2 MEJOR PARA BBDD -->
    <table>
        <caption>Coches</caption>
        <thead>
            <tr>
                <th>Matrícula</th>                
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($coches as $matricula => $coche) { ?>
                        <tr>
                            <td><?php echo $matricula ?></td>
                            <td><?php echo $coche ?></td>
                        </tr>
                <?php } ?>
        </tbody>
    </table>

</body>
</html>
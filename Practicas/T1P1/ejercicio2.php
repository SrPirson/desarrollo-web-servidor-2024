<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
    $array_vacio = [];
    $array1 = [];
    $array2 = [];
    $mostrar1 = "";
    $mostrar2 = "";

    for ($i = 0; $i < 5; $i++) {
        $num_alea1 = rand(1,10);
        $num_alea2 = rand(10,100);
        array_push($array1, $num_alea1);
        array_push($array2, $num_alea2);
        $mostrar1 .= $array1[$i] . ", ";
        $mostrar2 .= $array2[$i] . ", ";
    }
    array_push($array_vacio, $array1, $array2);

    echo "<p>$mostrar1</p>";
    echo "<p>$mostrar2</p>";

    $maximo1 = 0;
    $minimo1 = 100;
    $media1 = 0;
    for ($i = 0; $i < count($array1); $i++) { 
        if ($array1[$i] > $maximo1) {
            $maximo1 = $array1[$i];
        }
        if ($array1[$i] < $minimo1) {
            $minimo1 = $array1[$i];
        }
        $media1 += $array1[$i];
    }
    $media1 /= count($array1);

    $maximo2 = 0;
    $minimo2 = 1000;
    $media2= 0;
    for ($i = 0; $i < count($array2); $i++) { 
        if ($array2[$i] > $maximo2) {
            $maximo2 = $array2[$i];
        }
        if ($array2[$i] < $minimo2) {
            $minimo2 = $array2[$i];
        }
        $media2 += $array2[$i];
    }
    $media2 /= count($array2);

    echo "<h3>Array 1</h3>";
    echo "<ul>";
        echo "<li>Máximo: $maximo1</li>";
        echo "<li>Mínimo: $minimo1</li>";
        echo "<li>Media: $media1</li>";
    echo "</ul>";

    echo "<h3>Array 2</h3>";
    echo "<ul>";
        echo "<li>Máximo: $maximo2</li>";
        echo "<li>Mínimo: $minimo2</li>";
        echo "<li>Media: $media2</li>";
    echo "</ul>";

    ?>

</body>
</html>
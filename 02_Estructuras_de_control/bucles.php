<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles</title>

    <!-- Mostrar errores en la web -->
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>

</head>
<body>
    
    <h1>Lista con WHILE</h1>
    <?php

    /* BUCLE WHILE */
    $i = 1;

    echo "<ul>";
    while ($i <= 10) {
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>

    <h1>Lista con WHILE alternativa</h1>
    <?php

    /* BUCLE WHILE */
    $i = 1;

    echo "<ul>";
    while ($i <= 10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";
    ?>    

</body>
</html>
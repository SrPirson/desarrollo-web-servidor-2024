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

    <h1>Lista con FOR</h1>
    <?php

    /* BUCLE FOR */
    $i = 1;

    echo "<ul>";
    for($i = 1; $i <= 10; $i++){
        echo "<li>$i</li>";
    }
    echo "</ul>";
    ?>

    <h1>Lista con FOR alternativa</h1>
    <?php

    /* BUCLE FOR */

    echo "<ul>";
    for($i = 1; $i <= 10; $i++):
        echo "<li>$i</li>";
    endfor;
    echo "</ul>";
    ?>
    
    <h1>Lista con FOR con BREAK cursed</h1>
    <?php

    /* EJERMPLO 1 CURSED */

    echo "<ul>";
    for($i = 1; ; $i++){
        if($i > 10){
            break;
        }
        echo "<li>$i</li>";
    }
    echo "</ul>";
    ?>

    <?php

    /* EJERMPLO 2 CURSED */

    echo "<ul>";
    for($i = 1; ; ){
        if($i > 10){
            break;
        }
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>

    <?php   
    /* EJERMPLO 3 CURSED */
    $i = 1;

    echo "<ul>";
    for(; ; ){
        if($i > 10){
            break;
        }
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>


</body>
</html>
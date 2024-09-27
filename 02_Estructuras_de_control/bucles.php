<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles</title>
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

    <!-- 
        EJERCICIO 02:
        MOSTRAR EN UNA LISTA LOS NÚMEROS MÚLTIPLOS DE 3 USANDO WHILE E IF
    -->
    

    <!-- 
        EJERCICIO 03:
        CALCULAR LA SUMA DE LOS NÚMEROS PARES ENTRE 1 Y 20
    -->


    <!-- 
        EJERCICIO 04:
        CALCULAR EL FACTORIAL DE 6 CON WHILE
    -->
    

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
    $peliculas = [
        ["Kárate a muerte en Torremolinos", "Acción", 1975],
        ["Sharknado 1-5", "Acción", 2015],
        ["Princesa por sorpresa 2", "Comedia", 2008],
        ["Torrente", "Infantil", 2010],
        ["Stuart Little", "Terror", 2000],
    ]
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($peliculas as $pelicula) {
                // Descompone el array en varias variables, solamente dentro del foreach
                list($titulo, $categoria, $anio) = $pelicula; 
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$anio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>


<!-- 

    1.  AÑADIR CON UN RAND, LA DURACION DE CADA PELICULA COMO UNA NUEVA COLUMNA. 
        LA DURACION SERÁ UN NÚMERO ALEATORIO ENTRE 30 Y 240.

    2.  AÑADIR COMO UNA NUEVA COLUMNA, EL TIPO DE PELICULA. EL TIPO SERÁ:
         - CORTOMETRAJE, SI LA DURACIÓN ES MENOR QUE 60.
         - LARGOMETRAJE, SI LA DURACIÓN ES MAYOR O IGUAL QUE 60.
    
    3.  MOSTRAR EN OTRA TABLA, TODAS LAS COMUNAS Y ORDENAR ADEMÁS EN ESTE ORDEN:
         1. GÉNERO
         2. AÑO
         3. TÍTULO (TODO ALFABÉTICAMENTE Y EL AÑO DE MÁS RECIENTE A MÁS ANTIGUO)

-->



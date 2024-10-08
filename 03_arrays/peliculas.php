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
        ["Kárate a muerte en Torremolinos", "Acción", 1975, rand(30,240)],
        ["Sharknado 1-5", "Acción", 2015, rand(30,240)],
        ["Princesa por sorpresa 2", "Comedia", 2008, rand(30,240)],
        ["Torrente", "Infantil", 2010, rand(30,240)],
        ["Stuart Little", "Terror", 2000, rand(30,240)],
    ]
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Año</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($peliculas as $pelicula) { 
                // Descompone el array en varias variables, solamente dentro del foreach
                list($titulo, $categoria, $anio, $duracion) = $pelicula; ?>
                <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $categoria ?></td>
                <td><?php echo $anio ?></td>
                <td>
                    <?php
                    if($duracion < 60){
                        echo "CORTOMETRAJE";
                    } elseif ($duracion >= 60){
                        echo "LARGOMETRAJE";
                    }
                    ?>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br><br>

    <h2>Tabla ordenada</h2>

    <?php
    $_genero = array_column($peliculas, 0);
    $_anio = array_column($peliculas, 1);
    $_titulo = array_column($peliculas, 2);

    array_multisort($_genero, SORT_ASC, 
                    $_anio, SORT_ASC, 
                    $_titulo, SORT_ASC, 
                    $peliculas);
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Año</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($peliculas as $pelicula) { 
                // Descompone el array en varias variables, solamente dentro del foreach
                list($titulo, $categoria, $anio, $duracion) = $pelicula; ?>
                <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $categoria ?></td>
                <td><?php echo $anio ?></td>
                <td>
                    <?php
                    if($duracion < 60){
                        echo "CORTOMETRAJE";
                    } elseif ($duracion >= 60){
                        echo "LARGOMETRAJE";
                    }
                    ?>
                </td>
                </tr>
            <?php } ?>
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
    
    3.  MOSTRAR EN OTRA TABLA, TODAS LAS COLUMNAS Y ORDENAR ADEMÁS EN ESTE ORDEN:
         1. GÉNERO
         2. AÑO
         3. TÍTULO (TODO ALFABÉTICAMENTE Y EL AÑO DE MÁS RECIENTE A MÁS ANTIGUO)

-->



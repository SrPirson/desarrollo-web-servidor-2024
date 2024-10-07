<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Bidimensionales</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>

    <?php
    $videojuegos = [
        ["Disco Elysium", "RPG", 9.99],
        ["World of Warcraft", "MMORPG", 99999.99],
        ["Dragon Ball Z Kakarus", "Acción", 59.99],
        ["Minecraft", "Sandbox", 19.99],
        ["Stardew Valley", "Gestión de recursos", 7.99],
    ];

    $nuevo_videojuego = ["Octopath Traveler", "RPG", 29.95];
    array_push($videojuegos, $nuevo_videojuego); // Agrega un nuevo elemento al array
    array_push($videojuegos, ["Content Warning", "Exploración", 5.05]);
    array_push($videojuegos, ["Fall Guys", "Plataformas", 0]);
    array_push($videojuegos, ["Lego Fortnite", "Acción", 0]);

    for($i = 0; $i < count($videojuegos); $i++) {
        $videojuegos[$i][3] = "Gratis";
        if($videojuegos[$i][2] > 0) {
            $videojuegos[$i][3] = "No es gratis";
        }
    }
    
    //unset($videojuegos[2]); // Elimina esa posición del array
    //$videojuegos = array_values($videojuegos); // Reordena las posiciones del array


    // Ordenar arrays bidimensionales
    // Creamos variables de respaldo que queremos ordenar
    // Si vamos a ordenar de nuevo crear las variables de nuevo.
    $_titulo = array_column($videojuegos, 0);
    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);

    // Si fuera descendente, SORT_DESC
    //array_multisort($_titulo, SORT_ASC, $videojuegos);

    // Ordenar con varias opciones, si es la misma categoría ordena por el precio más alto
    //array_multisort($_categoria, SORT_ASC, $_precio, SORT_DESC, $videojuegos);

    // Ordenar por categorias, si tienen la misma por el precio más alto y si tienen el mismo por el titulo
    array_multisort($_categoria, SORT_ASC, 
                    $_precio, SORT_DESC, 
                    $_titulo, SORT_ASC, $videojuegos);
    ?>

    <table>
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($videojuegos as $videojuego) {
                // Descompone el array en varias variables, solamente dentro del foreach
                list($titulo, $categoria, $precio, $gratis) = $videojuego; 
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "<td>$gratis</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
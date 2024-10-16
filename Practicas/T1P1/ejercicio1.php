<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>

    <style>
        table {
    border: 2px solid rgb(172, 77, 196);
    }

    th, td {
        border: 2px solid rgb(20, 194, 165);
        padding: 10px;
    }

    caption {
        border: 2px solid pink;
    }

    .suspenso {
        background-color: rgb(207, 133, 133);
        color: white;
    }

    .aprobado {
        background-color: rgb(212, 247, 160);
    }
    </style>

</head>
<body>
    <?php
    
    $animes = [
        ["Dandadan", "Acción"],
        ["Frieren", "Fantasía"],
    ];

    
    array_push($animes, ["Tragones y mazmorras", "Comedia"]);
    array_push($animes, ["Los diarios de la boticaria", "Histórico"]);

    unset($animes[0]);
    $animes = array_values($animes);

    for($i = 0; $i < count($animes); $i++) {

        $num_alea_anio = rand(1990,2030);
        $num_alea_cap = rand(1,99);

        $animes[$i][2] = $num_alea_anio;
        $animes[$i][3] = $num_alea_cap;
        $animes[$i][4] = "Ya disponible";

        if ($animes[$i][2] > 2024) {
            $animes[$i][4] = "Próximamente";
        }

    }

    $_titulo = array_column($animes, 0);
    $_genero = array_column($animes, 1);
    $_anio = array_column($animes, 2);
    $_capitulos = array_column($animes, 3);
    $_disponibilidad = array_column($animes, 4);

    array_multisort($_genero, SORT_ASC, 
                    $_anio, SORT_ASC, 
                    $_titulo, SORT_ASC, $animes);

    ?>

    <table>
        <caption>Animes</caption>
        <thead>
            <tr>
                <th>Título</th>
                <th>Género</th>
                <th>Año</th>
                <th>Episodios</th>
                <th>Disponibilidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php

                foreach($animes as $anime) {
                    list($titulo, $genero, $anio, $capitulos, $dispo) = $anime; 
                    echo "<tr>";
                    echo "<td>$titulo</td>";
                    echo "<td>$genero</td>";
                    echo "<td>$anio</td>";
                    echo "<td>$capitulos</td>";
                    echo "<td>$dispo</td>";
                    echo "</tr>";
                }
                ?>
               
            </tr>
        </tbody>

    </table>


</body>
</html>
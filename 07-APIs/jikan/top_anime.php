<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 

        $apiUrl = "https://api.jikan.moe/v4/top/anime";

        // Configurar la conexion de a la API
        
        $curl = curl_init(); // Inicializamos la libreria cUrl
        curl_setopt($curl, CURLOPT_URL, $apiUrl); // Indicamos que la conexion va por URL e indicamos la URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Para habilitar la transferencia de datos
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];

    ?>

    <table class="table text-center table-bordered border-secundary table-hover table-light">
        <thead class="table-dark">
            <tr>
                <th>Titulo</th>
                <th>Nota</th>
                <th>Imagen</th>
                <th>Trailer</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                foreach ($animes as $anime) {
                    echo "<tr>";
                    echo "<td class='table-primary'>" . $anime["title"] . "</td>";
                    echo "<td class='table-success'>" . $anime["score"] . "</td>";
             ?>
                <td class='table-secondary'>
                    <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="<?php echo $anime["title"] ?>">
                </td>
                
                <td class='table-secondary'>
                    <iframe width="560" height="315" src="<?php echo $anime["trailer"]["embed_url"] ?>" title="<?php echo $anime["title"] ?>"></iframe>
                </td>
            <?php 
                    echo "</tr>";
                }   
            ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
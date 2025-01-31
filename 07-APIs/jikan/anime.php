<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        td img{
            width: 200px;
        }

        td iframe{
            width: 460px;
            height: 280px;
        }
    </style>
</head>
<body>
    <?php 
        /* No permitir mostrar la página si no tenemos ID */
        if (!isset($_GET["id"])) {
            header("location: top_anime.php");
        }

        $id = $_GET["id"];
        $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";

        // Configurar la conexion de a la API
        
        $curl = curl_init(); // Inicializamos la libreria cUrl
        curl_setopt($curl, CURLOPT_URL, $apiUrl); // Indicamos que la conexion va por URL e indicamos la URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Para habilitar la transferencia de datos
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];
    ?>

        <h1><?php echo $anime["title"] ?></h1>
        <h2><?php echo $anime["score"] ?></h2>

        <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="<?php echo $anime["title"] ?>">

        <p><?php echo $anime["synopsis"] ?></p>

        <iframe src="<?php echo $anime["trailer"]["embed_url"] ?>" title="<?php echo $anime["title"] ?>"></iframe>

        <h3>Géneros</h3>
        <ul>
            <?php
            $generos = $anime["genres"];
            foreach($generos as $genero) { ?>
                <li><?php echo $genero["name"] ?></li>
            <?php } ?>
        </ul>

        <h3>Animes relacionados</h3>
        <ul>
            <?php
            $relaciones = $anime["relations"];
            foreach ($relaciones as $relacion) {
                $entradas = $relacion["entry"];
                foreach ($entradas as $entrada) {
                    if ($entrada["type"] == "anime") { ?>
                        <li>
                            <a href="anime.php?id=<?php echo $entrada["mal_id"] ?>">
                                <?php echo $entrada["name"] ?>
                            </a>
                        </li>
                    <?php
                    }
                }
            }
            ?>
        </ul>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
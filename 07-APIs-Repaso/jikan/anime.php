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
</head>
<body>
    <?php
        $id = $_GET["id"];
        //importo la api
        $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";
        //conexion a la api
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        //Transformar la api a json para poder trabajar con la api
        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];

    ?>
    <h1><?php echo $anime["title"]?></h1>

    <img src="<?php echo $anime["images"]["jpg"]["image_url"]?>">


    <h3>Sipopsis</h3>
    <p><?php echo $anime["synopsis"]?></p>

    <h3>Generos</h3>
    <ul>
    <?php
        $generos = $anime["genres"];
        foreach ($generos as $genero) {
            echo "<li>" . $genero["name"] . "</li>";
        }
    ?>
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
                <a href="anime.php?id=<?php echo $entrada["mal_id"] ?>"> <?php echo $entrada["name"] ?> </a>
            </li>
            <?php }
        }
    }
    ?>
    </ul>
</body>
</html>
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

    <ol>
        <?php
        foreach ($animes as $anime) { ?>
            <li><?php echo $anime["title"] ?></li>
        <?php } ?>
    </ol>
</body>
</html>
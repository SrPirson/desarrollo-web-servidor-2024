<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro Aleatorio</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $apiUrl = "https://dog.ceo/api/breeds/list/all";


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);


    $datos = json_decode($respuesta, true);
    $razas = $datos["message"];

    ?>

    <form method="get">
        <input type="submit" value="Aleatorio">
    </form>
    <img src="<?php echo $fotoPerro ?>" alt="">
    
</body>
</html>
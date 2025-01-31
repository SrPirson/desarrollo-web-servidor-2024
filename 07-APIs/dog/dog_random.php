<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro aleatorio</title>
</head>
<body>


    <?php

        $apiUrlName = "https://dog.ceo/api/breeds/list/all";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrlName);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $names = $datos["message"];



    ?>

    <form method="get">
        <label for="razas">Selecciona una raza:</label>

        <select name="razas" id="razas">
            <?php foreach ($names as $name) { ?>
                <select value="<?php $name[""] ?>"></select>
            <?php } ?>
        </select>
    </form>

    
    <?php

        $apiUrlImg = "https://dog.ceo/api/breed/affenpinscher/images/random";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrlImg);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $dogs = $datos["message"];

    ?>

    <img src="<?php echo $dogs ?>" alt="Perro">

</body>
</html>
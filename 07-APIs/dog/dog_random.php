<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro aleatorio</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
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
        $razas = $datos["message"];

    ?>

    <form method="get">
        <label for="razas">Selecciona una raza:</label>
        <select name="razas" id="razas">
            <?php foreach ($razas as $raza => $subrazas) { ?>
                <option value="" hidden>-- Selecciona una raza --</option>
                    <?php if (empty($subrazas)) { ?>
                        <option value="<?php echo $raza ?>"><?php echo $raza ?></option>
                    <?php } else {
                        foreach ($subrazas as $subraza) { ?>
                            <option value="<?php echo $raza . " " . $subraza ?>"><?php echo $raza . " " . $subraza ?></option>
                    <?php }} ?>
            <?php } ?>
        </select>
    </form>

    
    <?php


        $apiUrlImg = "https://dog.ceo/api/breed/basenji/images/random";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrlImg);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $dogs = $datos["message"];

    ?>

    <br><img src="<?php echo $dogs ?>" alt="Perro">
    <a href="?">Random</a>

</body>
</html>
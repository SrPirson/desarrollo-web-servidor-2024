<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick & Morty</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
</head>
<body>

    <?php

    if (isset($_GET["gender"])) {
        $genero = $_GET["gender"];
        if ($genero != "male" && $genero != "female") {
            $genero = "";
        }
    } else {
        $genero = "";
    }

    if (isset($_GET["species"])) {
        $especie = $_GET["species"];
        if ($especie != "human" && $especie != "alien") {
            $especie = "";
        }
    } else {
        $especie = "";
    }

    $apiUrl = "https://rickandmortyapi.com/api/character/?gender=$genero&species=$especie";
    //$apiUrl = "https://rickandmortyapi.com/api/character/1,3/";
               

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);


    $datos = json_decode($respuesta, true);
    $personajes = $datos["results"];

    ?>

    <form method="get">

    <h4>Filtro</h4>

    <label for="count">Cantidad a mostrar</label>
    <input type="text" id="count" name="count"><br>

    <label for="gender">Genero:</label>
    <select name="gender" id="gender">
        <option value="" hidden> -- Selecciona un genero --</option>
        <option value="female">Mujer</option>
        <option value="male">Hombre</option>
    </select><br>

    <label for="species">Especie:</label>
    <select name="species" id="species">
        <option value="" hidden> -- Selecciona una especie --</option>
        <option value="human">Humano</option>
        <option value="alien">Alienígena</option>
    </select><br>
    <input type="submit" value="Filtrar">

    </form>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Especie</th>
                <th>Origen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personajes as $personaje) { ?>
                <tr>
                    <td><img src="<?php echo $personaje["image"] ?>"></td>
                    <td><?php echo $personaje["name"] ?></td>
                    <td><?php echo $personaje["gender"] ?></td>
                    <td><?php echo $personaje["species"] ?></td>
                    <td><?php echo $personaje["origin"]["name"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
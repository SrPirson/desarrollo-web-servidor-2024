<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémons</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php

        if (isset($_GET["limit"])) {
            $limite = $_GET["limit"];
            if ($limite < 1) {
                $limite = 5;
            }
        } else {
            $limite = 5;
        }

        if (isset($_GET["offset"])) {
            $offset = $_GET["offset"];
            if ($offset < 1) {
                $offset = 0;
            }
        } else {
            $offset = 0;
        }

        $pokeAPI = "https://pokeapi.co/api/v2/pokemon/?offset=$offset&limit=$limite";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $pokeAPI);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);


        $datos = json_decode($respuesta, true);
        $pokemons = $datos["results"];



    ?>

        <br><br><form method="get">
            <label for="limit">¿Cuantos pokemons quieres mostrar?</label>
            <input type="number" id="limit" name="limit">
            <input type="submit" value="Mostrar">
        </form><br><br>

        <table class="table text-center table-bordered border-secundary table-hover table-light">
            <thead class="table-dark">
                <tr>
                    <th>Pokémon</th>
                    <th>Imagen</th>
                    <th>Tipos</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($pokemons as $pokemon) { ?>
                <tr>
                    <?php
                    $namePokemon = $pokemon["name"];
                    $pokeAPI = "https://pokeapi.co/api/v2/pokemon/$namePokemon";

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $pokeAPI);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $respuesta = curl_exec($curl);
                    curl_close($curl);


                    $datos = json_decode($respuesta, true);

                    ?>
                    <td><?php echo ucfirst($datos["name"]); ?></td>
                    <td><img src="<?php echo ($datos["sprites"]["front_default"]); ?>" alt="<?php echo ucfirst($datos["name"]); ?>" width="100"></td>                        
                    <td>
                        <?php foreach ($datos["types"] as $type) { ?>
                            <?php echo ucfirst($type["type"]["name"]) . " "; ?>
                        <?php } ?>
                    </td>
                <?php } ?>
                </tr>
            </tbody>
        </table>

        <?php 
            if ($offset <= 0) { ?>
                <a href="" class="btn btn-primary" hidden>Anterior</a>
        <?php } else { ?>
                <a href="?offset=<?= ($offset - $limite) ?>&limit=<?= $limite ?>" class="btn btn-primary">Anterior</a>
        <?php } ?>
        
        <a href="?offset=<?= ($offset + $limite) ?>&limit=<?= $limite ?>" class="btn btn-primary">Siguiente</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
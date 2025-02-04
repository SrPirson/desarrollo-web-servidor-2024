<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMES</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
</head>
<body>
    <?php

        if (isset($_GET["page"])) {
            $paginaPrincipal = $_GET["page"];
            if ($paginaPrincipal < 1) {
                $paginaPrincipal = 1;
            }
        } else {
            $paginaPrincipal = 1;
        }

        if (isset($_GET["type"])) {
            $filtro = $_GET["type"];
        } else {
            $filtro = "";
        }
        

        $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$paginaPrincipal&type=$filtro";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);


        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $paginas = $datos["pagination"];

        $paginaActual = $paginas["current_page"];
        $nextPagina = ($paginaActual + 1);
        $prePagina = ($paginaActual - 1);
        $totalPaginas = $paginas["last_visible_page"];

        ?>

        <form method="get">
            <h4>Filtro</h4>
            <input type="radio" id="tv" name="type" value="tv" <?php if ($filtro == "tv"){ echo "checked"; } ?>>
            <label for="tv">Series</label>
            <input type="radio" id="movie" name="type" value="movie" <?php if ($filtro == "movie"){ echo "checked"; } ?>>
            <label for="movie">Peliculas</label>
            <input type="submit" value="Filtrar">
        </form><br><br>

        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Puntuacion</th>
                    <th>Portada</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animes as $anime) { ?>
                    <tr>
                        <td><a href="anime.php?id=<?php echo $anime["mal_id"] ?>"> <?php echo $anime["title"] ?> </a></td>
                        <td><?php echo $anime["score"] ?></td>
                        <td><img src="<?php echo $anime["images"]["jpg"]["image_url"]?>" ></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
            if ($paginaActual > 1 && $filtro != "") { ?>
                <a href="?page=<?php echo $prePagina ?>&type=<?php echo $filtro ?>">Anterior</a>
        <?php } else if ($paginaActual > 1) { ?>
                <a href="?page=<?php echo $prePagina ?>">Anterior</a>
        <?php } else { ?>
                <a href="#" hidden>Anterior</a>
        <?php } ?>


        <?php
            if ($paginaActual < $totalPaginas && $filtro != "") { ?>
                <a href="?page=<?php echo $nextPagina ?>&type=<?php echo $filtro ?>">Siguiente</a>
        <?php } else if ($paginaActual < $totalPaginas) { ?>
                <a href="?page=<?php echo $nextPagina ?>">Siguiente</a>
        <?php } else { ?>
                <a href="#" hidden>Siguiente</a>
        <?php } ?>
        


</body>
</html>
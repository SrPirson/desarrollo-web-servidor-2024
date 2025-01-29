<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        td img {
            width: 200px;
        }

        td iframe {
            width: 460px;
            height: 280px;
        }
    </style>
</head>
<body>
    <?php 
        if (isset($_GET['page'])) {
            $paginaPrincipal = $_GET['page'];
            if ($paginaPrincipal < 1) {
                $paginaPrincipal = 1;
            }
        } else {
            $paginaPrincipal = 1;
        }

        if (isset($_GET['type'])) {
            $filtroPrincipal = $_GET['type'];
        } else {
            $filtroPrincipal = "";
        }

        $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$paginaPrincipal&type=$filtroPrincipal";

        // Configurar la conexión a la API
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

    <form action="" method="get">
        <br><h5>Filtrar</h5>
        <input type="radio" id="tv" name="type" value="tv" 
            <?php if ($filtroPrincipal == "tv") {
                echo "checked"; 
            } ?>>
        <label for="tv">Serie </label>
        <input type="radio" id="movie" name="type" value="movie" 
            <?php if ($filtroPrincipal == "movie") {
                echo "checked"; 
            } ?>>
        <label for="movie">Película </label>
        <input type="radio" id="todo" name="type" value="" 
            <?php if ($filtroPrincipal == "") { 
                echo "checked"; 
            } ?>>
        <label for="todo">Todo </label><br>
        <input class="btn btn-warning" type="submit" value="Filtrar"><br><br>
    </form>

    <table class="table text-center table-bordered border-secundary table-hover table-light">
        <thead class="table-dark">
            <tr>
                <th>Posición</th>
                <th>Título</th>
                <th>Nota</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                foreach ($animes as $anime) {
                    echo "<tr>";
                    echo "<td class='table-primary'>" . $anime["rank"] . "</td>";
            ?>
                    <td class="table-warning">
                        <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                            <?php echo $anime["title"] ?>
                        </a>
                    </td>
            <?php
                    echo "<td class='table-success'>" . $anime["score"] . "</td>";
            ?>
                    <td class='table-secondary'>
                        <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="<?php echo $anime["title"] ?>">
                    </td>
            <?php 
                    echo "</tr>";
                }   
            ?>
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center my-3">
        <!-- Página anterior -->
        <?php if ($paginaActual > 1 && $filtroPrincipal != "") { ?>
            <a href="?page=<?= $prePagina ?>&type=<?= $filtroPrincipal ?>" class="btn btn-primary">Anterior</a>
        <?php } elseif ($paginaActual > 1) { ?>
            <a href="?page=<?= $prePagina ?>" class="btn btn-primary">Anterior</a>
        <?php } else { ?>
            <a href="#" class="btn btn-secondary" hidden>Anterior</a>
        <?php } ?>

        <!-- Siguiente página -->
        <?php if ($paginaActual < $totalPaginas) { ?>
            <a href="?page=<?= $nextPagina ?>&type=<?= $filtroPrincipal ?>" class="btn btn-primary">Siguiente</a>
        <?php } elseif (condition) { ?>
            <a href="?page=<?= $nextPagina ?>" class="btn btn-primary">Siguiente</a>
        <?php } else { ?>
            <a href="#" class="btn btn-secondary" hidden>Siguiente</a>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
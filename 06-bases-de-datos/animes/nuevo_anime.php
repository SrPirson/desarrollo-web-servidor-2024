<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
        
        require("conexion.php");

        session_start(); // Siempre hay que abrir la sesión, para recuperar
        if (isset($_SESSION["usuario"])) {
            echo "<h2>Bienvenid@ " . $_SESSION["usuario"] . "</h2>";
        } else {
            header("location: usuario/iniciar_sesion.php"); // Solo se puede utilizar en el head (Función peligrosa)
            exit; // MATA EL FICHERO shhh
        }

    ?>
</head>
<body>
    <div class="container">
        <h1>Nuevo anime</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST["titulo"];
            $nombre_estudio = $_POST["nombre_estudio"];
            $anno_estreno = $_POST["anno_estreno"];
            $num_temporadas = $_POST["num_temporadas"];

            /* 
                $_POST  -> ES un array UNIDIMENSIONAL
                $_FILES -> Es un array BIDIMENSIONAL
            */
            //var_dump($_FILES["imagen"]);
            $nombre_img = $_FILES["imagen"]["name"];
            $ubi_tmp_img = $_FILES["imagen"]["tmp_name"];
            $ubi_final_img = "./IMG/$nombre_img";
            $type_img = $_FILES["imagen"]["type"];

            move_uploaded_file($ubi_tmp_img, $ubi_final_img);

            
            $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen) 
                VALUES ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas, '$ubi_final_img')";

            $_conexion -> query($sql); 
           
        }
        
        $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
        $resultado = $_conexion -> query($sql);
        $estudios = [];

        while ($fila = $resultado -> fetch_assoc()) {
            array_push($estudios, $fila["nombre_estudio"]);
        }
        // print_r($estudios);

        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label>
                <select class="form-select" name="nombre_estudio">
                    <option disabled selected hidden>--- Seleccione un estudio ---</option>
                    <?php
                        foreach ($estudios as $estudio) { ?>
                            <option value="<?php echo $estudio ?>">
                                <?php echo $estudio ?>
                            </option>
                        <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" type="text" name="anno_estreno">
            </div>
            <div class="mb-3">
                <label class="form-label">Número de temporadas</label>
                <input class="form-control" type="text" name="num_temporadas">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>
            <div class="mb-3 btn-group">
                <input class="btn btn-info" type="submit" value="Insertar">
                <a class="btn btn-info" href="index.php">Volver</a>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
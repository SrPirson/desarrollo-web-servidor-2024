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

    <style>
    .container{
        border: 1px solid black;
        padding: 10px;
        margin-top: 10px;
    }
    .error {
        color: red;
    }
    h1{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        function depurar($entrada) {
            if ($entrada == null) {
                return "";
            }
            $salida = htmlspecialchars($entrada); // Para que no lleguen scripts o cosas raras que no queremos
            $salida = trim($salida); // Elimina los espacios de antes y despues
            $salida = stripslashes($salida); // Elimina las barras invertidas (\) de la cadena
            $salida = preg_replace('!\s+!', ' ', $salida); // Reemplaza cualquier cantidad de espacios en blanco por un solo espacio.
            return $salida;
        }
    ?>

    <div class="container">
    <h1>Estudios</h1>
    <hr><br>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_ciudad = depurar($_POST["ciudad"]);

            /* Validación nombre de estudio */
            if ($tmp_nombre == "") {
                $err_nombre = "El nombre del estudio es obligatorio.";
            } else {
                $patron_nombre = "/^[a-zA-Z0-9 ]+$/";
                if (!preg_match($patron_nombre, $tmp_nombre)) {
                    $err_nombre = "El formato del nombre de estudio solo admite letras y números.";
                } else {
                    $nombre = $tmp_nombre;
                }
            }

            /* Validación ciudad */
            if ($tmp_ciudad == "") {
                $err_ciudad = "La ciudad es obligatoria.";
            } else {
                $patron_ciudad = "/^[a-zA-Z]+$/";
                if (!preg_match($patron_ciudad, $tmp_ciudad)) {
                    $err_ciudad = "El formato de la ciudad solo admite letras.";
                } else {
                    $ciudad = $tmp_ciudad;
                }
            }
        }
    ?>

    <form action="" method="post">

        <!-- Nombre estudio -->
        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre de estudio</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre">
                <?php 
                    if(isset($err_nombre)){
                        echo "<span class='error'>$err_nombre</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Ciudad -->
        <div class="row mb-3">
            <label for="ciudad" class="col-sm-2 col-form-label">Ciudad</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ciudad" name="ciudad">
                <?php 
                    if(isset($err_ciudad)){
                        echo "<span class='error'>$err_ciudad</span>";
                    }
                ?>
            </div>
        </div>

        <br>
        <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>

    </form>
    </div>

    <?php
        /* Mostrar texto */
        if (isset($nombre) && isset($ciudad)) {
            echo "<div class='container'>";
    ?>

            <h1><?php echo "Texto enviado" ?></h1>
            <hr>
            <h4><?php echo "Nombre del estudio: $nombre";?></h4>
            <h4><?php echo "Ciudad: $ciudad";?></h4>
    <?php
            echo "</div>";
        }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
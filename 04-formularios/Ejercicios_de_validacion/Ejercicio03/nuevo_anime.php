<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animes</title>

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
    <h1>Animes</h1>
    <hr><br>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = depurar($_POST["titulo"]);
            if (isset($_POST["estudio"])) {
                $tmp_estudio = depurar($_POST["estudio"]);
            } else {
                $tmp_estudio = "";
            }
            $tmp_anio = depurar($_POST["anio"]);
            $tmp_temporadas = depurar($_POST["temporadas"]);


            /* Validación titulo */
            if ($tmp_titulo == "") {
                $err_titulo = "El titulo es obligatorio.";
            } else {
                if (strlen($tmp_titulo) > 80) {
                    $err_titulo = "El titulo tiene un maximo del 80 caracteres.";
                } else {
                    $titulo = $tmp_titulo;
                }
            }

            /* Validación nombre estudio */
            if ($tmp_estudio == "") {
                $err_estudio = "El nombre del estudio es obligatorio.";
            } else {
                $lista_estudios = ["ghibli", "madhouse", "trigger", "mappa", "cloverworks"];
                if (!in_array($tmp_estudio, $lista_estudios)) {
                    $err_estudio = "El estudio introducido es erroneo.";
                } else {
                    $estudio = $tmp_estudio;
                }
            }

            /* Validación año estreno */
            if (!is_numeric($tmp_anio)) {
                $err_anio = "El año debe ser numerico.";
            } else {
                $anioValido = (date("Y") + 5);
                if ($tmp_anio < 1960 || $tmp_anio > $anioValido) {
                    $err_anio = "El año de estreno comprenden entre 1960 y $anioValido.";
                } else {
                    $anio = $tmp_anio;
                }
            }

            /* Validación número de temporadas */
            if ($tmp_temporadas == "") {
                $err_temporadas = "El número de temporadas es obligatorio.";
            } else {
                if (!is_numeric($tmp_temporadas)) {
                    $err_temporadas = "El número de temporadas no es valido.";
                } else {
                    if ($tmp_temporadas > 99 || $tmp_temporadas < 1) {
                        $err_temporadas = "El número de temporadas tiene que ser entre 1 y 99.";
                    } else {
                        $temporadas = $tmp_temporadas;
                    }
                }
            }

        }
    ?>

    <form action="" method="post">
        <!-- Titulo -->
        <div class="row mb-3">
            <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titulo" name="titulo">
                <?php 
                    if(isset($err_titulo)){
                        echo "<span class='error'>$err_titulo</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Nombre estudio -->
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nombre de estudio</label>
            <div class="col-sm-10">
                <select class="form-select" name="estudio">
                    <option disabled selected hidden>--- Seleccione un estudio ---</option>
                    <option value="ghibli">Studio Ghibli</option>
                    <option value="madhouse">Madhouse</option>
                    <option value="trigger">Trigger</option>
                    <option value="mappa">MAPPA</option>
                    <option value="cloverworks">CloverWorks</option>
                </select>
                <?php
                    if(isset($err_estudio)){
                        echo "<span class='error'>$err_estudio</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Año de estreno -->
        <div class="row mb-3">
            <label for="anio" class="col-sm-2 col-form-label">Año de estreno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="anio" name="anio">
                <?php 
                    if(isset($err_anio)){
                        echo "<span class='error'>$err_anio</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Número de temporadas -->
        <div class="row mb-3">
            <label for="temporadas" class="col-sm-2 col-form-label">Número de temporadas</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="temporadas" name="temporadas">
                <?php 
                    if(isset($err_temporadas)){
                        echo "<span class='error'>$err_temporadas</span>";
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
        if (isset($titulo) && isset($estudio) && isset($temporadas)) {
            echo "<div class='container'>";
    ?>

            <h1><?php echo "Texto enviado" ?></h1>
            <hr>
            <h4><?php echo "Titulo: $titulo";?></h4>
            <h4><?php echo "Nombre del estudio: $estudio";?></h4>
            <h4><?php echo "Fecha de estreno: $anio";?></h4>
            <h4><?php echo "Número de temporadas: $temporadas";?></h4>
    <?php
            echo "</div>";
        }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
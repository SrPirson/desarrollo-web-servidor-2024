<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    <h1>Validación de libros</h1>
    <hr>

    <?php 
    
    /* Validaciones */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_titulo = depurar($_POST["titulo"]); 
        $tmp_paginas = depurar($_POST["paginas"]); 
        if (isset($_POST["genero"])) {
            $tmp_genero = depurar($_POST["genero"]);
        } else {
            $tmp_genero = "";
        }
        if (isset($_POST["secuela"])) {
            $tmp_secuela = depurar($_POST["secuela"]);
        } else {
            $tmp_secuela = "";
        }
        $tmp_fecha = depurar($_POST["fecha"]);
        $tmp_sinopsis = depurar($_POST["sinopsis"]);


        /* Validación titulo */
        if ($tmp_titulo == "") {
            $err_titulo = "El titulo es obligario";
        } else {
            if (strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 40) {
                $err_titulo = "El titulo debe tener entre 1 y 40 caracteres.";
            } else {
                $patron_titulo = "/^[a-zA-Z]{1}[a-zA-Z0-9.,; áéíóúÁÉÍÓÚñÑ]+/";
                if (!preg_match($patron_titulo, $tmp_titulo)) {
                    $err_titulo = "El titulo debe empezar por una letra y puede contener letras, espacios en blanco, números, tildes, comas y puntos.";
                } else {
                    $titulo = ucwords(strtolower($tmp_titulo));
                }
            }
        }

        /* Validación paginas */
        if ($tmp_paginas == "") {
            $err_paginas = "El número de páginas es obligario.";
        } else {
            if (!is_numeric($tmp_paginas)) {
                $err_paginas = "El número de páginas debe ser númerico.";
            } else {
                if ($tmp_paginas < 10 || $tmp_paginas > 9999) {
                    $err_paginas = "El número de páginas debe tener entre 10 y 9999 páginas.";
                } else {
                    $paginas = $tmp_paginas;
                }
            }
        }

        /* Validación género */
        if ($tmp_genero == "") {
            $err_genero = "El genero es obligatorio.";
        } else {
            $lista_genero = ["fantasia", "cienciaFiccion", "romance", "drama"];
            if (!in_array($tmp_genero, $lista_genero)) {
                $err_genero = "El genero no es valido";
            } else {
                $genero = $tmp_genero;
            }
        }

        /* Validación género */
        if ($tmp_secuela == "") {
            $secuela = "no";
        } else {
            $lista_secuela = ["si", "no"];
            if (!in_array($tmp_secuela, $lista_secuela)) {
                $err_genero = "El genero no es valido";
            } else {
                $secuela = $tmp_secuela;
            }
        }


        /* Validación fecha de publicación */
        $patron_fecha = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
        if (!preg_match($patron_fecha, $tmp_fecha)) {
            $err_fecha = "El formato de la fecha no es correcta.";
        } else {
            $fechaLimiteMenor = ["1800", "01", "01"];
            $fechaLimiteMayor = explode("-", date("Y-m-d"));
            $fechaLimiteMayor[0] += 3;
            $fechaSeleccionada = explode("-", $tmp_fecha);

            /* Controlar fecha más antigua */
            if ($fechaSeleccionada[0] < $fechaLimiteMenor[0]) {
                $err_fecha = "La fecha más antigua admisible es el $fechaLimiteMenor[2]/$fechaLimiteMenor[1]/$fechaLimiteMenor[0].";
            } elseif ($fechaSeleccionada[0] == $fechaLimiteMenor[0]) {
                if ($fechaSeleccionada[1] < $fechaLimiteMenor[1]) {
                    $err_fecha = "La fecha más antigua admisible es el $fechaLimiteMenor[2]/$fechaLimiteMenor[1]/$fechaLimiteMenor[0].";
                } elseif ($fechaSeleccionada[1] == $fechaLimiteMenor[1]) {
                    if ($fechaSeleccionada[2] < $fechaLimiteMenor[2]) {
                        $err_fecha = "La fecha más antigua admisible es el $fechaLimiteMenor[2]/$fechaLimiteMenor[1]/$fechaLimiteMenor[0].";
                    } else {
                        $fecha = $tmp_fecha;
                    }
                } else {
                    $fecha = $tmp_fecha;
                }
            } else {
                /* Controlar fecha más futura */
                if ($fechaSeleccionada[0] > $fechaLimiteMayor[0]) {
                    $err_fecha = "La fecha más a futuro admisible es el $fechaLimiteMayor[2]/$fechaLimiteMayor[1]/$fechaLimiteMayor[0].";
                } elseif ($fechaSeleccionada[0] == $fechaLimiteMayor[0]) {
                    if ($fechaSeleccionada[1] > $fechaLimiteMayor[1]) {
                        $err_fecha = "La fecha más a futuro admisible es el $fechaLimiteMayor[2]/$fechaLimiteMayor[1]/$fechaLimiteMayor[0].";
                    } elseif ($fechaSeleccionada[1] == $fechaLimiteMayor[1]) {
                        if ($fechaSeleccionada[2] > $fechaLimiteMayor[2]) {
                            $err_fecha = "La fecha más a futuro admisible es el $fechaLimiteMayor[2]/$fechaLimiteMayor[1]/$fechaLimiteMayor[0].";
                        } else {
                            $fecha = $tmp_fecha;
                        }
                    } else {
                        $fecha = $tmp_fecha;
                    }
                } else {
                    $fecha = $tmp_fecha;
                }
            }
        }

        /* Validación sinopsis */
        $patron_sinopsis = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+/";
        if (!preg_match($patron_sinopsis, $tmp_sinopsis)) {
            $err_sinopsis = "El formato de la sinopsis solo admite letras con o sin tilde y espacios";
        } else {
            if (strlen($tmp_sinopsis) < 0 || strlen($tmp_sinopsis) > 255) {
                $err_sinopsis = "La descripción tiene que tener entre 0 y 255 caracteres.";
            } else {
                $sinopsis = $tmp_sinopsis;
            }
        }
    }
    
    ?>

    <form action="" method="post">

        <!-- Título -->
        <div class="row mb-3">
            <label for="titulo" class="col-sm-2 col-form-label">Título</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titulo" name="titulo">
                <?php 
                    if(isset($err_titulo)){
                        echo "<span class='error'>$err_titulo</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Páginas -->
        <div class="row mb-3">
            <label for="paginas" class="col-sm-2 col-form-label">Páginas</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="paginas" name="paginas">
                <?php 
                    if(isset($err_paginas)){
                        echo "<span class='error'>$err_paginas</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Género -->
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Género</legend>
            <div class="col-sm-10">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="fantasia">
                    <label class="form-check-label" for="gridRadios1">
                        Fantasía
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="gridRadios2" value="cienciaFiccion">
                    <label class="form-check-label" for="gridRadios2">
                        Ciencia Ficción
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="gridRadios3" value="romance">
                    <label class="form-check-label" for="gridRadios3">
                        Romance
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="gridRadios4" value="drama">
                    <label class="form-check-label" for="gridRadios4">
                        Drama
                    </label>
                </div>
                <?php 
                    if(isset($err_genero)){
                        echo "<span class='error'>$err_genero</span>";
                    }
                ?>
            </div>
        </fieldset>

        <!-- Secuela -->
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">¿Tiene secuela?</label>
            <div class="col-sm-10">
                <select class="form-select" name="secuela">
                    <option disabled selected hidden>--- Selecciona si tiene secuela ---</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <?php
                    if(isset($err_secuela)){
                        echo "<span class='error'>$err_secuela</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Fecha de publicación -->
        <div class="row mb-3">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha de publicación</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="fecha" id="fecha">
                <?php 
                    if(isset($err_fecha)){
                        echo "<span class='error'>$err_fecha</span>";
                    }
                ?>
            </div>
        </div>

        <!-- Sinopsis -->
        <div class="input-group">
            <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
            <textarea class="form-control" aria-label="With textarea" name="sinopsis"></textarea>
                <?php
                    if(isset($err_sinopsis)){
                        echo "<span class='error'>$err_sinopsis</span>";
                    }
                ?>
        </div>

        <br>
        <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>

    </form>
    </div>

    <?php
        /* Mostrar texto */
        if (isset($titulo) && isset($paginas) && isset($genero)) {
            echo "<div class='container'>";
    ?>

            <h1><?php echo "Texto enviado" ?></h1>
            <hr>
            <h4><?php echo "Titulo: $titulo";?></h4>
            <h4><?php echo "Número de páginas: $paginas";?></h4>
            <h4><?php echo "Género: $genero";?></h4>
            <h4><?php echo "¿Tiene secuela?: $secuela";?></h4>
            <h4><?php echo "Fecha de publicación: $fecha";?></h4>
            <h4><?php echo "Sinopsis: $sinopsis";?></h4>
    <?php
            echo "</div>";
            echo "<br>";
        }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
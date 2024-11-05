<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Comprobar errores -->
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

        <h1>Ejercicio 01</h1>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Titulo
            $tmp_titulo = depurar($_POST["titulo"]); 
            // Consola
            if (isset($_POST["consola"])) {
                $tmp_consola = depurar($_POST["consola"]);
            } else {
                $tmp_consola = "";
            }
            // Fecha
            $tmp_fecha = depurar($_POST["fecha"]);
            // PEGI
            if (isset($_POST["pegi"])) {
                $tmp_pegi = depurar($_POST["pegi"]);
            } else {
                $tmp_pegi = "";
            }
            // Descrición
            $tmp_descripcion = depurar($_POST["descripcion"]);



            /* Validación título */
            if ($tmp_titulo == "") {
                $err_titulo = "El titulo es obligatorio.";
            } else {
                if (strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 80) {
                    $err_titulo = "El titulo tiene que tener entre 1 y 80 caracteres.";
                } else {
                    $titulo = ucwords(strtolower($tmp_titulo));
                }
            }


            /* Validación consola */
            if ($tmp_consola == "") {
                $err_consola = "La consola es obligatoria.";
            } else {
                $lista_consolas = ["switch", "ps5", "ps4", "xboxSeX", "xboxSeZ", "pc"];
                if (!in_array($tmp_consola, $lista_consolas)) {
                    $err_consola = "La consola seleccionada no es válida.";
                } else {
                    $consola = $tmp_consola;
                }
            }


            /* Validación fecha de lanzamiento */
            if ($tmp_fecha == "") {
                $err_fecha = "La fecha de lanzamiento es obligatoria.";
            } else {
                $patron_fecha = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if (!preg_match($patron_fecha, $tmp_fecha)) {
                    $err_fecha = "El formato de la fecha no es correcta.";
                } else {
                    $fechaLimiteMenor = ["1947", "01", "01"];
                    $fechaLimiteMayor = explode("-", date("Y-m-d"));
                    $fechaLimiteMayor[0] += 5;
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
            }


            /* Validación PEGI */
            if ($tmp_pegi == "") {
                $err_pegi = "El PEGI es obligatorio.";
            } else {
                $lista_pegi = [3, 7, 12, 16, 18];
                if (!in_array($tmp_pegi, $lista_pegi)) {
                    $err_pegi = "El PEGI no es valido";
                } else {
                    $pegi = $tmp_pegi;
                }
            }


            /* Validación descripción */
            if (strlen($tmp_descripcion) < 0 || strlen($tmp_descripcion) > 255) {
                $err_descripcion = "La descripción tiene que tener entre 0 y 255 caracteres.";
            } else {
                $descripcion = strtolower($tmp_descripcion);
            }

        }

        ?>

        <!-- Formulario -->
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

            <!-- Consola -->
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Consola</legend>
                <div class="col-sm-10">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="consola" id="gridRadios1" value="switch">
                        <label class="form-check-label" for="gridRadios1">
                            Switch
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="consola" id="gridRadios2" value="ps5">
                        <label class="form-check-label" for="gridRadios2">
                            PS5
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="consola" id="gridRadios3" value="ps4">
                        <label class="form-check-label" for="gridRadios3">
                            PS4
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="consola" id="gridRadios4" value="xboxSeX">
                        <label class="form-check-label" for="gridRadios4">
                            Xbox Series X
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="consola" id="gridRadios5" value="xboxSeZ">
                        <label class="form-check-label" for="gridRadios5">
                            Xbox Series Z
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="consola" id="gridRadios6" value="pc">
                        <label class="form-check-label" for="gridRadios6">
                            PC
                        </label>
                    </div>
                    <?php 
                        if(isset($err_consola)){
                            echo "<span class='error'>$err_consola</span>";
                        }
                    ?>
                </div>
            </fieldset>

            <!-- Fecha de lanzamiento -->
            <div class="row mb-3">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha de lanzamiento</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecha" id="fecha">
                        <?php 
                            if(isset($err_fecha)){
                                echo "<span class='error'>$err_fecha</span>";
                            }
                        ?>
                    </div>
            </div>

            <!-- Pegi -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">PEGI</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="pegi">
                            <option disabled selected hidden>--- Selecciona el PEGI ---</option>
                            <option value="3">3</option>
                            <option value="7">7</option>
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                        <?php
                            if(isset($err_pegi)){
                                echo "<span class='error'>$err_pegi</span>";
                            }
                        ?>
                    </div>
            </div>

            <!-- Descipción -->
            <div class="input-group">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                <textarea class="form-control" aria-label="With textarea" name="descripcion"></textarea>
                    <?php
                        if(isset($err_descripcion)){
                            echo "<span class='error'>$err_descripcion</span>";
                        }
                    ?>
            </div>

            <br>
            <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>

        </form>

    </div>

    <!-- Mostrar texto -->
    <div class="container">

    <?php
        if (isset($titulo) && isset($consola) && isset($fecha) && isset($pegi)) {
    ?>
            <h3><?php echo "Texto enviado" ?></h3>
            <hr>
            <h4><?php echo "Titulo: $titulo" ?></h4>
            <h4><?php echo "Consola: $consola" ?></h4>
            <h4><?php echo "Fecha de lanzamiento $fecha" ?></h4>
            <h4><?php echo "Pegi: $pegi" ?></h4>
            <h4><?php echo "Descripción: $descripcion" ?></h4>
    <?php
        }
    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
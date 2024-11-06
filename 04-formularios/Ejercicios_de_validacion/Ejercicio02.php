<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de la liga</title>
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

    <h1>Equipos de la liga</h1>
    <hr>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nombre
        $tmp_nombre = depurar($_POST["nombre"]); 
        // Inicial
        $tmp_inicial = depurar($_POST["inicial"]);
        // Liga
        if (isset($_POST["liga"])) {
            $tmp_liga = depurar($_POST["liga"]);
        } else {
            $tmp_liga = "";
        }
        // Ciudad
        $tmp_ciudad = depurar($_POST["ciudad"]);
        // Titulo
        if (isset($_POST["titulo"])) {
            $tmp_titulo = depurar($_POST["titulo"]);
        } else {
            $tmp_titulo = "";
        }
        // Fecha
        $tmp_fecha = depurar($_POST["fecha"]); 
        // Jugadores
        $tmp_jugadores = depurar($_POST["jugadores"]); 


        /* Validación nombre */
        if ($tmp_nombre == "") {
            $err_nombre = "El nombre es obligatorio.";
        } else {
            $patron_nombre = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ.]+/";
            if (!preg_match($patron_nombre, $tmp_nombre)) {
                $err_nombre = "El nombre solo puede contener letras, espacios en blanco y puntos.";
            } else {
                if (strlen($tmp_nombre) < 1 || strlen($tmp_nombre) > 30) {
                    $err_nombre = "El nombre tiene que tener entre 1 y 30 caracteres.";
                } else {
                    $nombre = ucwords(strtolower($tmp_nombre));
                }
            }
        }


        /* Validación inicial */
        if ($tmp_inicial == "") {
            $err_inicial = "La inicial es obligatoria.";
        } else {
            $patron_inicial = "/^[a-zA-Z]{3}+/";
            if (!preg_match($patron_inicial, $tmp_inicial)) {
                $err_inicial = "La inicial solo puede contener tres letras.";
            } else {
                if (strlen($tmp_inicial) < 1 || strlen($tmp_inicial) > 3) {
                    $err_inicial = "La inicial tiene que tener entre 1 y 3 letras.";
                } else {
                    $inicial = ucwords(strtolower($tmp_inicial));
                }
            }
        }


        /* Validación liga */
        if ($tmp_liga == "") {
            $err_liga = "La liga es obligatoria.";
        } else {
            $lista_liga = ["ligaEASports", "ligaHypermotion", "primeraRFEF"];
            if (!in_array($tmp_liga, $lista_liga)) {
                $err_liga = "La liga no es valida";
            } else {
                $liga = $tmp_liga;
            }
        }


        /* Validación ciudad */
        if ($tmp_ciudad == "") {
            $err_ciudad = "El nombre es obligatorio.";
        } else {
            $patron_ciudad = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑçÇ]+/";
            if (!preg_match($patron_ciudad, $tmp_ciudad)) {
                $err_ciudad = "La ciudad solo puede contener letras y espacios en blanco.";
            } else {
                $ciudad = ucwords(strtolower($tmp_ciudad));
            }
        }


        /* Validación titulo */
        if ($tmp_titulo == "") {
            $err_titulo = "La liga es obligatoria.";
        } else {
            $lista_titulo = ["si", "no"];
            if (!in_array($tmp_titulo, $lista_titulo)) {
                $err_titulo = "La liga no es valida";
            } else {
                $titulo = $tmp_titulo;
            }
        }


        /* Validación fecha de lanzamiento */
        if ($tmp_fecha == "") {
            $err_fecha = "La fecha de fundación es obligatoria.";
        } else {
            $patron_fecha = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if (!preg_match($patron_fecha, $tmp_fecha)) {
                $err_fecha = "El formato de la fecha no es correcta.";
            } else {
                $fechaLimiteMenor = ["1889", "12", "18"];
                $fechaActual = explode("-", date("Y-m-d"));
                $fechaSeleccionada = explode("-", $tmp_fecha);

                
            }
        }

    }

    ?>

    <!-- Formulario -->
    <form action="" method="post">

        <!-- Nombre -->
        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre">
                <?php 
                    if(isset($err_nombre)){
                        echo "<span class='error'>$err_nombre</span>";
                    }
                ?>
            </div>
        </div>


        <!-- Inicial -->
        <div class="row mb-3">
            <label for="inicial" class="col-sm-2 col-form-label">Inicial</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inicial" name="inicial">
                <?php 
                    if(isset($err_inicial)){
                        echo "<span class='error'>$err_inicial</span>";
                    }
                ?>
            </div>
        </div>


        <!-- Liga -->
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Liga</label>
            <div class="col-sm-10">
                <select class="form-select" name="liga">
                    <option disabled selected hidden>--- Selecciona la Liga ---</option>
                    <option value="ligaEASports">Liga EA Sports</option>
                    <option value="ligaHypermotion">Liga Hypermotion</option>
                    <option value="primeraRFEF">Primera RFEF</option>
                </select>
                <?php
                    if(isset($err_liga)){
                        echo "<span class='error'>$err_liga</span>";
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


        <!-- Titulo -->
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <select class="form-select" name="titulo">
                    <option disabled selected hidden>--- Selecciona si tiene titulo ---</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <?php
                    if(isset($err_titulo)){
                        echo "<span class='error'>$err_titulo</span>";
                    }
                ?>
            </div>
        </div>


        <!-- Fecha de fundación -->
        <div class="row mb-3">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha de fundación</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="fecha" id="fecha">
                    <?php 
                        if(isset($err_fecha)){
                            echo "<span class='error'>$err_fecha</span>";
                        }
                    ?>
                </div>
        </div>


        <!-- Número de jugadores -->
        <div class="row mb-3">
            <label for="jugadores" class="col-sm-2 col-form-label">Número de jugadores</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="jugadores" name="jugadores">
                <?php 
                    if(isset($err_jugadores)){
                        echo "<span class='error'>$err_jugadores</span>";
                    }
                ?>
            </div>
        </div>

        <br>
        <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>

    </form>

    
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Comprobar errores -->
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
    ?>

    <!-- Estilos -->
    <style>
        .error {
            color: red;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Formulario Usuario</h1>
        <br>
        <h4>Fecha actual: <?php echo date("d-m-Y") ?></h4>
        <br><br>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_usuario = $_POST["usuario"];
                $tmp_nombre = $_POST["nombre"];
                $tmp_apellidos = $_POST["apellidos"];
                $tmp_dni = $_POST["dni"];
                $tmp_correo = $_POST["correo"];
                $tmp_fechaNac = $_POST["fechaNac"];


                /* Validación usuario */
                if ($tmp_usuario == "") {
                    $err_usuario = "El usuario es obligatorio.";
                } else {
                    // Letras de la "A" a la "Z" (mayus o minus), números y barrabaja (4-12 caracteres)
                    $patron_usuario = "/^[a-zA-Z0-9_]{4,12}$/";
                    if (!preg_match($patron_usuario, $tmp_usuario)) { // preg_match para comprobar con el patron, primero el patrón despues con lo que queremos comprobarlo
                       $err_usuario = "El usuario debe contener de 4 a 12 letras, números o barrabaja."; 
                    } else {
                        $usuario = $tmp_usuario;
                    }
                }


                /* Validación nombre */
                if ($tmp_nombre == "") {
                    $err_nombre = "El nombre es obligario";
                } else {
                    if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 40) {
                        $err_nombre = "El nombre debe tener entre 2 y 40 caracteres.";
                    } else {
                        // letras, espacios en blanco y tildes
                        $patron_nombre = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]+/"; // El + se usa para que compruebe todos los caracteres
                        if (!preg_match($patron_nombre, $tmp_nombre)) {
                            $err_nombre = "El nombre solo puede contener letras y espacios en blanco.";
                        } else {
                            $nombre = $tmp_nombre;
                        }
                    }
                }


                /* Validación apellido */
                if ($tmp_apellidos == "") {
                    $err_apellidos = "El apellido es obligario";
                } else {
                    if (strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 60) {
                        $err_apellidos = "El apellido debe tener entre 2 y 60 caracteres.";
                    } else {
                        // letras, espacios en blanco y tildes
                        $patron_apellidos = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]+/"; // El + se usa para que compruebe todos los caracteres
                        if (!preg_match($patron_apellidos, $tmp_apellidos)) {
                            $err_apellidos = "El apellido solo puede contener letras y espacios en blanco.";
                        } else {
                            $apellidos = $tmp_apellidos;
                        }
                    }
                }


                /* Validación DNI */
                if ($tmp_dni == "") {
                    $err_dni = "El DNI es obligatorio";
                } else {
                    $tmp_dni = strtoupper($tmp_dni);
                    $patron_dni = "/^[0-9]{8}[A-Z]$/";
                    if (!preg_match($patron_dni, $tmp_dni)) {
                        $err_dni = "El DNI debe tener 8 dígitos y 1 letra";
                    } else {
                        // substr espedificamos el rango que queremos guardar
                        // en la variable tmp_dni empieza en la posición 0 y crea un array de 8 (0-7)
                        $numero_dni = (int)substr($tmp_dni,0,8);
                        $letra_dni = substr($tmp_dni,8,1);

                        $resto_dni = $numero_dni % 23;
                        
                        $letra_correcta = match($resto_dni) {
                            0 => "T",
                            1 => "R",
                            2 => "W",
                            3 => "A",
                            4 => "G",
                            5 => "M",
                            6 => "Y",
                            7 => "F",
                            8 => "P",
                            9 => "D",
                            10 => "X",
                            11 => "B",
                            12 => "N",
                            13 => "J",
                            14 => "Z",
                            15 => "S",
                            16 => "Q",
                            17 => "V",
                            18 => "H",
                            19 => "L",
                            20 => "C",
                            21 => "K",
                            22 => "E"
                        };
                        

                        /* 
                        Otra forma de hacerlo 
                        Guardamos todas las letras del DNI en una variable
                        Hacemos un substr de las letras en la posición del resto de los números
                        De esta manera tenemos en el array solamente la letra correcta
                        
                        $letra_dni = "TRWAGMYFPDXBNJZSQVHLCKE";
                        $letra_correcta = substr($letra_dni, $resto_dni, 1);
                        */
                        if ($letra_dni != $letra_correcta) {
                            $err_dni = "La letra del DNI no es correcta";
                        } else {
                            $dni = $tmp_dni;
                        }
                    }
                }


                /* Validación correo electronico */
                if ($tmp_correo == "") {
                    $err_correo = "El correo electrónico es obligatorio.";
                } else {
                    $patron_correo = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
                    if (!preg_match($patron_correo, $tmp_correo)) { 
                       $err_correo = "El correo electrónico no es válido."; 
                    } else {
                        $palabras_baneadas = ["caca", "peo", "recorcholis", "caracoles", "repampanos"];
                        $palabras_encontradas = "";
                        foreach ($palabras_baneadas as $palabra_baneada) {
                            if (str_contains($tmp_correo, $palabra_baneada)) {
                                $palabras_encontradas = "$palabra_baneada, $palabras_encontradas";
                            }
                            if ($palabras_encontradas != "") {
                                $err_correo = "No se permiten las palabras: $palabras_encontradas";
                            } else {
                                $correo = $tmp_correo;
                            }
                        }
                    }
                }


                /* Validación fecha nacimiento */
                if ($tmp_fechaNac == "") {
                    $err_fechaNac = "La fecha de nacimiento es obligatorio.";
                } else {
                    $patron_fecha = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if (!preg_match($patron_fecha, $tmp_fechaNac)) {
                        $err_fechaNac = "El formato de la fecha no es correcta.";
                    } else {
                        $fechaActual = explode("-", date("Y-m-d"));
                        // list($anno_actual,$mes_actual,$dia_actual) = explode("-", date("Y-m-d"));
                        $nacimiento = explode("-", $tmp_fechaNac);
                        // list($anno,$mes,$dia) = explode("-", $tmp_fechaNac);

                        if (($fechaActual[0] - $nacimiento[0]) > 18 && ($fechaActual[0] - $nacimiento[0]) <= 120) {
                            $fechaNac = $tmp_fechaNac;
                        } elseif (($fechaActual[0] - $nacimiento[0]) < 18) {
                            $err_fechaNac = "Eres menor de edad";
                        } elseif (($fechaActual[0] - $nacimiento[0]) > 120) {
                            $err_fechaNac = "Eres demasiado mayor";
                        } else {
                            if (($fechaActual[1] - $nacimiento[1]) > 0) {
                                $fechaNac = $tmp_fechaNac;
                            } elseif (($fechaActual[1] - $nacimiento[1]) < 0) {
                                $err_fechaNac = "Eres menor de edad";
                            } else {
                                if (($fechaActual[2] - $nacimiento[2]) >= 0) {
                                    $fechaNac = $tmp_fechaNac;
                                } elseif (($fechaActual[2] - $nacimiento[2]) < 0) {
                                    $err_fechaNac = "Eres menor de edad";
                                }
                            }
                        }
                    } 
                }


            }
        ?>


        <!-- Fomulario Bootstrap -->
        <form action="" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text">Nombre y apellidos</span>
                <input type="text" class="form-control" name="nombre">
                <input type="text" class="form-control" name="apellidos">
                <?php 
                if(isset($err_nombre)){
                    echo "<span class='error'>$err_nombre</span>";
                }
                echo "<br>";
                if(isset($err_apellidos)){
                    echo "<span class='error'>$err_apellidos</span>";
                }
                ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Usuario</span>
                <input type="text" class="form-control" name="usuario">
                <?php 
                if(isset($err_usuario)){
                    echo "<span class='error'>$err_usuario</span>";
                } 
                ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">DNI</span>
                <input type="text" class="form-control" name="dni">
                <?php 
                if(isset($err_dni)){
                    echo "<span class='error'>$err_dni</span>";
                } 
                ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Correo electrónico</span>
                <input type="text" class="form-control" name="correo">
                <?php 
                if(isset($err_correo)){
                    echo "<span class='error'>$err_correo</span>";
                } 
                ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Fecha nacimiento</span>
                <input type="DATE" class="form-control" name="fechaNac">
                <?php 
                if(isset($err_fechaNac)){
                    echo "<span class='error'>$err_fechaNac</span>";
                } 
                ?>
            </div>

            <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>

        </form>

        <?php
            if (isset($dni) && isset($correo) && isset($apellidos) && isset($usuario) && isset($nombre) && isset($fechaNac)) {
        ?>
                <h1><?php echo $nombre ?></h1>
                <h1><?php echo $apellidos ?></h1>
                <h1><?php echo $dni ?></h1>
                <h1><?php echo $usuario ?></h1>
                <h1><?php echo $correo ?></h1>
                <h1><?php echo "Eres mayor de edad" ?></h1>
        <?php
            }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
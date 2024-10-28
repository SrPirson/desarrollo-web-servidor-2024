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
        <br><br><br>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_usuario = $_POST["usuario"];
                $tmp_nombre = $_POST["nombre"];
                $tmp_apellidos = $_POST["apellidos"];

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
                <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>
                <?php 
                if(isset($err_usuario)){
                    echo "<span class='error'>$err_usuario</span>";
                } 
                ?>
            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
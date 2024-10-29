<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Validación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Comprobar errores -->
    <?php

use Ramsey\Uuid\Type\Integer;

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
                $tmp_nombre = $_POST["nombre"];
                $tmp_apellido1 = $_POST["apellido1"];
                $tmp_apellido2 = $_POST["apellido2"];
                $tmp_dni = $_POST["dni"];
                $tmp_nacimiento = $_POST["nacimiento"];
                $tmp_correo = $_POST["correo"];

                if ($tmp_dni == "") {
                    $err_dni = "El DNI es obligatorio.";
                } else {
                    $patron_dni = "/^[0-9]{8}[a-zA-Z]{1}$/";
                    if (!preg_match($patron_dni, $tmp_dni)) {
                       $err_dni = "El DNI debe contener de 8 números y 1 letra";
                    } else {
                        $total = 0;
                        $correcto = false;
                        for ($i=0; $i < 8; $i++) { 
                            $total += (int)$tmp_dni[$i];
                            echo $tmp_dni[$i];
                        }
                        echo "Resultado total " . $total;
                        $total %= 23;
                        echo "Resultado division " . $total;

                        switch ($total) {
                            case 'value':
                                
                                break;
                        }

                        
                        if (!$correcto) {
                            $err_dni = "El DNI es incorrecto";
                        } else {
                            $dni = $tmp_dni;
                        }
                    }
                }

            }
        ?>



        <!-- Fomulario Bootstrap -->
        <form action="" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text">Nombre</span>
                <input type="text" class="form-control" name="nombre">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Primer apellido</span>
                <input type="text" class="form-control" name="apellido1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Segundo apellido</span>
                <input type="text" class="form-control" name="apellido2">

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
                <span class="input-group-text">Fecha de Nacimiento</span>
                <input type="text" class="form-control" name="nacimiento">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Correo electrónico</span>
                <input type="text" class="form-control" name="correo">

            </div>

            <button class="btn btn-outline-info" value="Enviar" type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>
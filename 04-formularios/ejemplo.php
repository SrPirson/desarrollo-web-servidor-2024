<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <h3>[Corruptos] < [Pocion de veneno 2]</h3>
    <br>
    <form action="" method="post">
        <!-- name es el id de este input -->
        Mensaje: <input type="text" name="mensaje">
        Número: <input type="text" name="numero">
        <input type="submit" value="Enviar">
    </form>

    <?php
    /* $_SERVER es un array que contiene información */
    if($_SERVER["REQUEST_METHOD"] == "POST"){ // Importante todo en MAYUSCULAS
        /* Este código se ejecuta cuando el servidor recibe una petición POST */
        $mensaje = $_POST["mensaje"];
        //echo "<h4>$mensaje</h4>";

        /*
        Añadir al formulario un campo de texto adicional para introducir un número
        Mostrar el mensaje tantas veces como indique el número. 
        */
        $numero = $_POST["numero"];
        for($i = 1; $i <= $numero; $i++){
            echo "<h4>$mensaje</h4>";
        }
    }
    ?>
</body>
</html>
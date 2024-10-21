<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varios formularios</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
        
        /* Importamos la funcion de temperatura */
        require("../05-funciones/temperaturas.php");
        require("../05-funciones/edades.php");
    ?>
</head>
<body>

    <h3>Temperaturas</h3>
    <br>

    <form action="" method="post">
        <label for="temp">Temperatura: </label> 
        <input type="text" name="temp" id="temp">
        <select name="original">
            <option value="celsius">CELSIUS</option>
            <option value="kelvin">KELVIN</option>
            <option value="fahrenheit">FAHRENHEIT</option>
        </select>
        <br><br>
        <label for="change">Convertir a: </label>
        <select name="change" id="change">
            <option value="kelvin">KELVIN</option>
            <option value="fahrenheit">FAHRENHEIT</option>
            <option value="celsius">CELSIUS</option>
        </select>
        <br><br>
        <!-- Añadimos una etiqueta oculta para diferenciar los formularios -->
        <input type="hidden" name="accion" value="formulario_temperaturas">
        <input type="submit" value="Convertir">
    </form>

    <br><br><br>
    <h3>Edades</h3>
    <br>

    <form action="" method="post">
        <label for="name">Nombre:      </label>
        <input type="text" name="name" id="name" placeholder="Introduzca su nombre">
        <br><br>
        <label for="age">Edad: </label> 
        <input type="text" name="age" id="age" placeholder="Introduzca su edad">
        <br><br>
        <!-- Añadimos una etiqueta oculta para diferenciar los formularios -->
        <input type="hidden" name="accion" value="formulario_edades">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_temperaturas") {
            $temperatura = $_POST["temp"];
            $original = $_POST["original"];
            $cambio = $_POST["change"];
            convertirTemperatura($temperatura, $original, $cambio);
        }
    }
    ?>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_edades") {
            $nombre = $_POST["name"];
            $edad = $_POST["age"];
            comprobarEdad($nombre, $edad);
        }
    }
    ?>



</body>
</html>
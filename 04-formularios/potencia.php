<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require("../05-funciones/potencias.php");
    ?>
</head>
<body>
    <!-- 
    CREAR UN FORMULARIO QUE RECIBA DOS PARÁMETROS: BASE Y EXPONENTE
    CUANDO SE ENVÍE EL FORMULARIO, SE CALCULARÁ EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE
    EJEMPLOS:
        2 ELEVADO A 3 = 8
        3 ELEVADO A 2 = 9
        2 ELEVADO A 1 = 2
        3 ELEVADO A 0 = 1
    -->

    <h3>Calculadora de potencias</h3>
    <br>
    <form action="" method="post">
        <!-- name es el id de este input -->
        <label for="base">Base:      </label>
        <input type="text" name="base" id="base" placeholder="Introduzca la base">
        <br><br>
        <label for="elevado">Elevado: </label> 
        <input type="text" name="elevado" id="elevado" placeholder="Introduzca el exponente">
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    $mostrar = "Resultado = ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 

        $tmp_base = $_POST["base"];
        $tmp_exponente = $_POST["elevado"];

        // Comprobaciones de la base
/*         
        if ($tmp_base != "") {
            if (filter_var($tmp_base, FILTER_VALIDATE_INT) !== FALSE) {
                $base = $tmp_base;
            } else {
                echo "<p>La base debe ser un número entero</p>";
            }
        } else {
            echo "<p>La base es obligatoria</p>";
        } 
*/

        // Otra forma de comprobar - Invertimos las comprobaciones
        if ($tmp_base == "") {
            echo "<p>La base es obligatoria</p>";
        } else {
            if (filter_var($tmp_base, FILTER_VALIDATE_INT) === FALSE) {
                echo "<p>La base debe ser un número entero</p>";
            } else {
                $base = $tmp_base;
            }
        }

        // Comprobaciones del exponente
/* 
        if ($tmp_exponente != "") {
            if (filter_var($tmp_exponente, FILTER_VALIDATE_INT) !== FALSE) {
                if ($tmp_exponente >= 0) {
                    $exponente = $tmp_exponente;
                } else {
                    echo "<p>El exponente debe ser mayor o igual que cero</p>";
                }
            } else {
                echo "<p>El exponente debe ser un número entero</p>";
            }
        } else {
            echo "<p>El exponente es obligatorio</p>";
        }
*/

        // Otra forma de comprobar - Invertimos las comprobaciones
        if ($tmp_exponente == "") {
            echo "<p>El exponente es obligatorio</p>";
        } else {
            if (filter_var($tmp_exponente, FILTER_VALIDATE_INT) === FALSE) {
                echo "<p>El exponente debe ser un número entero</p>";
            } else {
                if ($tmp_exponente < 0) {
                    echo "<p>El exponente debe ser mayor o igual que cero</p>";
                } else {
                    $exponente = $tmp_exponente;
                }
            }
        }
        
        if (isset($base) && isset($exponente)) { // isset - si la variable existe
            $resultado = potencia($base, $exponente);
            echo "<p>El resultado es $resultado</p>";
        } else {
            echo "<p>Bobolon</p>";
        }

    }
    ?>
</body>
</html>
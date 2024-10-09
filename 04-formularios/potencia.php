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

        $base = $_POST["base"];
        $elevado = $_POST["elevado"];
        $resultado = $base;

        if($elevado == 0) {
            $resultado = 1;
        } elseif ($elevado == 1) {
            $resultado = $base;
        } else {
            for($i = 1; $i < $elevado; $i++) {
                $resultado *= $base;
            }
        }

        $mostrar = "$mostrar" . "$resultado";

    }
    echo "<br>";
    echo $mostrar;
    ?>
</body>
</html>
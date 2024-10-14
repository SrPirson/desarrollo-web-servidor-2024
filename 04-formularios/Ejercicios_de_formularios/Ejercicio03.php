<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <h3>Ejercicio 03</h3>
    <br>

    <form action="" method="post">
        <label for="num1">Número 1: </label>
        <input type="text" name="num1" id="num1">
        <br>
        <label for="num2">Número 2: </label>
        <input type="text" name="num2" id="num2">
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = (int)$_POST["num1"];
        $num2 = (int)$_POST["num2"];
        $primos = "";
        
        for ($i = $num1; $i <= $num2; $i++) { 
            $es_primo = true;
            
            for ($j = 2; $j <= $i/2; $j++) {
                if ($i % $j == 0) {
                    $es_primo = false;
                    break;
                }
            }

            if ($es_primo) {
                $primos .= $i . " ";
            }
            
        }
        
        echo "<br><br>";
        if ($primos != "") {
            echo "Los primos son: $primos";
        } else {
            echo "No hay números primos en el rango indicado.";
        }
    }
    ?>

</body>
</html>

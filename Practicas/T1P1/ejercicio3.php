<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="numero">Número: </label> 
        <input type="text" name="numero" id="numero">

        <select name="eleccion">
            <option value="sumatorio">Sumatorio</option>
            <option value="factorial">Factorial</option>
        </select>
        <br><br>
        <input type="submit" value="Convertir">
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["numero"];
        $select = $_POST["eleccion"];

        switch ($select) {
            case "sumatorio":
                $total_sum = 0;
                for ($i = 0; $i <= $num; $i++) { 
                    $total_sum += $i;
                }
                echo "<h4>El sumatorio de $num es $total_sum</h4>";
                break;
            
            case "factorial":
                $total_factorial = 1;
                for ($i = 1; $i <= $num; $i++) { 
                    $total_factorial *= $i;
                }
                echo "<h4>El factorial de $num es $total_factorial</h4>";
                break;
        }
    }

    ?>
</body>
</html>
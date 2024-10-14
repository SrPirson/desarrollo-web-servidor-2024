<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <h3>Ejercicio 04</h3>
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
        <input type="submit" value="Convertir">
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp = $_POST["temp"];
        $original = $_POST["original"];
        $change = $_POST["change"];
        $convertidor = $temp;
        echo "<br><br>";
        
        if ($original == $change) {
            echo "ERROR: La conversión es la misma.";
        } else {
            switch ($original) {
                case "celsius":
                    if ($change == "kelvin") {
                        $convertidor = $temp + 273.15;
                    } else {
                        $convertidor = ($temp * 9/5) + 32;
                    }
                    break;
                case "kelvin";
                    if ($change == "celsius") {
                        $convertidor = $temp - 273.15;
                    } else {
                        $convertidor = ($temp - 273.15) * 9/5 + 32;
                    }
                    break;
                case "fahrenheit";
                    if ($change == "celsius") {
                        $convertidor = ($temp - 32) * 5/9;
                    } else{
                        $convertidor = ($temp - 32) * 5/9 + 273.15;
                    }
                    break;
            }
            echo "$temp grados $original son $convertidor grados $change";
        }

    }

    ?>

</body>
</html>
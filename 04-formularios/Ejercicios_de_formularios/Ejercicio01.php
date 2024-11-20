<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <h3>Ejercicio 01</h3>
    <br>

    <form action="" method="post">
        <label for="num1">Número 1: </label> 
        <input type="text" name="num1" id="num1">
        <br>
        <label for="num2">Número 2: </label> 
        <input type="text" name="num2" id="num2">
        <br>
        <label for="num3">Número 3: </label> 
        <input type="text" name="num3" id="num3">
        <br><br>
        <input type="submit" value="Mayor">
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        $mayor = $num1;

        if ($num2 > $mayor) {
            $mayor = $num2;
        } 
        if ($num3 > $mayor) {
            $mayor = $num3;
        }
        echo "<br><br>";
        echo "El número mayor es el $mayor.";
    }

    ?>

</body>
</html>
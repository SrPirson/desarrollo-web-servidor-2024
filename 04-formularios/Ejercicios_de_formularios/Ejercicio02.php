<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <h3>Ejercicio 02</h3>
    <br>

    <form action="" method="post">
        <label for="a">Número A: </label>
        <input type="text" name="a" id="a">
        <br>
        <label for="b">Número B: </label>
        <input type="text" name="b" id="b">
        <br>
        <label for="c">Número C: </label>
        <input type="text" name="c" id="c">
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        $multiplos = "";
        echo "<br><br>";

        if($a >= $b) {
            echo "ERROR: No se pueden ver los multiplos del rango indicado.";
        } else {
            for ($i = $a; $i <= $b; $i++) { 
                if(($i % $c) == 0){
                    $multiplos .= $i . " ";
                }
            }
            if($multiplos != ""){
                echo "Los múltiplos de $c entre $a y $b son: $multiplos";
            } else {
                echo "No existen múltiplos de $c entre $a y $b.";
            }
            
        }

    }

    ?>

</body>
</html>
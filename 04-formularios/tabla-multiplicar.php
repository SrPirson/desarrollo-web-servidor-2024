<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla multiplicar</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <!-- 
    CREAR UN FORMULARIO QUE RECIBA UN NÚMERO
    SE MOSTRARÁ LA TABLA DE MULTIPLICAR DE ESE NUMERO EN UNA TABLA HTML
    2 X 1 = 2
    2 X 2 = 4
    ...
    2 X 10 = 20
    -->

    <h3>Tabla de multiplicar</h3>
    <br>
    <form action="" method="post">
        <label for="number">Número:      </label>
        <input type="text" name="number" id="number" placeholder="Introduzca un número">
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Multiplicando</th>
                <th></th>
                <th>Multiplicador</th>
                <th></th>
                <th>Producto</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $mostrar = "Nombre: ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num = $_POST["number"];
        for($i = 0; $i <= 10; $i++){
            $resultado = $num*$i;
            echo "<tr>";
                echo "<td>$num</td>";
                echo "<td>x</td>";
                echo "<td>$i</td>";
                echo "<td>=</td>";
                echo "<td>$resultado</td>";
            echo "</tr>";
        }
    }
    ?>
        </tbody>
    </table>
</body>
</html>
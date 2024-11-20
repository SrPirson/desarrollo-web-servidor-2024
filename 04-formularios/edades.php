<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <!-- 
    CREAR UN FORMULARIO QUE RECIBA EL NOMBRE Y LA EDAD DE UNA PERSONA
    SI LA EDAD ES MENOR QUE 18, SE MOSTRARÁ EL NOMBRE
    SI LA EDAD ESTÁ ENTRE 18 Y 65, SE MOSTRARÁ EL NOMBRE Y QUE ES MAYOR DE EDAD
    SI LA EDAD ES MÁS DE 65, SE MOSTRARÁ EL NOMBRE Y QUE SE HA JUBILADO
    -->

    <h3>Edades</h3>
    <br>
    <form action="" method="post">
        <label for="name">Nombre:      </label>
        <input type="text" name="name" id="name" placeholder="Introduzca su nombre">
        <br><br>
        <label for="age">Edad: </label> 
        <input type="text" name="age" id="age" placeholder="Introduzca su edad">
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    $mostrar = "Nombre: ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $age = $_POST["age"];

        if($age < 18){
            $mostrar = "$mostrar" . "$name.";
        } elseif($age >= 18 && $age <= 65){
            $mostrar = "$mostrar" . "$name. " . "Edad: " . $age;
        } else {
            $mostrar = "$mostrar" . "$name. " . "Está jubilado";
        }
        echo "<br>";
        echo $mostrar;
    }
    ?>

</body>
</html>
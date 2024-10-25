<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('../05-funciones/iva.php');
    ?>
    <style>
        .error {
            color: lime;
            font-style: italic;
        }
    </style>
</head>
<body>

    <?php
    /* Declaro todo arriba para detectar los errores */
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            /* Controlar precio */
            $tmp_precio = $_POST["precio"];
            if (isset($_POST["iva"])) {
                $tmp_iva = $_POST["iva"];
            } else {
                $tmp_iva = "";
            }

            if($tmp_precio == '') {
                $error_precio = "El precio es obligatorio";
            } else {
                if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                    $error_precio = "El precio debe ser un número";
                } else {
                    if($tmp_precio < 0) {
                        $error_precio = "El precio debe ser mayor o igual que cero";
                    } else {
                        $precio = $tmp_precio;
                    }
                }
            }

            /* Controlar el iva */
            if($tmp_iva == '') {
                $error_iva =  "El IVA es obligatorio";
            } else {
                $valores_validos_iva = ["general", "reducido", "superreducido"];
                if(!in_array($tmp_iva, $valores_validos_iva)) { // Ver si el elemento no está en el array
                    $error_iva = "El IVA solo puede ser: general, reducido, superreducido";
                } else {
                    $iva = $tmp_iva;
                }
            }
        }
    ?>

    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <!-- Mostramos el error en caso de que haya -->
        <?php 
            if(isset($error_precio)) {
                echo "<span class='error'> $error_precio</span>";
            } 
        ?>
        <br><br>
        <select name="iva">
            <!-- 
            option disabled selected hidden
            disabled - para no poder seleccionarlo
            selected - para que aparezca seleccionada por defecto
            hidden   - para que no aparezca en el desplegable
            -->
            <option disabled selected hidden>--- Elige un tipo de IVA ---</option>

            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select>
        <?php 
            if(isset($error_iva)) {
                echo "<span class='error'> $error_iva</span>";
            } 
        ?>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if(isset($precio) && isset($iva)) {
            echo "<br>";
            echo "<h1>El PVP es " . calcularPVP($precio, $iva) . "</h1>";
        }
    ?>
</body>
</html>
<?php
    function comprobarEdad($nombre, $edad){
        $mostrar = "Nombre: ";
        if($edad < 18){
            $mostrar = "$mostrar" . "$nombre.";
        } elseif($edad >= 18 && $edad <= 65){
            $mostrar = "$mostrar" . "$nombre. " . "Edad: " . $edad;
        } else {
            $mostrar = "$mostrar" . "$nombre. " . "Está jubilado";
        }
        echo "<br><br>";
        echo $mostrar;
    }
?>
<?php
    function pontenciador($base, $elevado){
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
    }
?>
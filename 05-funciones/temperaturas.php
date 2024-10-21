<?php

    function convertirTemperatura($temperaturaInicial, $unidadInicial, $unidadFinal){
        $convertidor = $temperaturaInicial;
        
        if ($unidadInicial == $unidadFinal) {
            echo "ERROR: La conversión es la misma.";
        } else {
            switch ($unidadInicial) {
                case "celsius":
                    if ($unidadFinal == "kelvin") {
                        $convertidor = $temperaturaInicial + 273.15;
                    } else {
                        $convertidor = ($temperaturaInicial * 9/5) + 32;
                    }
                    break;
                case "kelvin";
                    if ($unidadFinal == "celsius") {
                        $convertidor = $temperaturaInicial - 273.15;
                    } else {
                        $convertidor = ($temperaturaInicial - 273.15) * 9/5 + 32;
                    }
                    break;
                case "fahrenheit";
                    if ($unidadFinal == "celsius") {
                        $convertidor = ($temperaturaInicial - 32) * 5/9;
                    } else{
                        $convertidor = ($temperaturaInicial - 32) * 5/9 + 273.15;
                    }
                    break;
            }
            echo "<br><br>";
            echo "$temperaturaInicial grados $unidadInicial son $convertidor grados $unidadFinal";
        }

    }

?>
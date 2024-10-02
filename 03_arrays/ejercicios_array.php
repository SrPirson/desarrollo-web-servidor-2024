<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Array</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <!-- EL VIERNES VEMOS COMO ORDENAR TABLAS -->
    <!--

    EJERCICIO 01

    Desarrollo web en entorno servidor => Alejandra
    Desarrollo web en entorno cliente => José Miguel
    Diseño de interfaces web => José Miguel
    Desplieges de aplicaciones => Jaime
    Empresa e iniciativa emprenderora => Convalidado
    Inglés => Virginia

    MOSTRARLO TODO EN UNA TABLA

    -->
    <?php
    $calendario = [
        "Desarrollo web en entorno servidor" => "Alejandra",
        "Desarrollo web en entorno cliente" => "José Miguel",
        "Diseño de interfaces web" => "José Miguel",
        "Desplieges de aplicaciones" => "Jaime",
        "Empresa e iniciativa emprenderora" => "Convalidado",
        "Inglés" => "Virginia",
    ];
    ?>

    <table>
        <caption>Calendario</caption>
        <thead>
            <tr>
                <th>Asignatura</th>                
                <th>Profesor/a</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($calendario as $asignatura => $profesor) { ?>
                        <tr>
                            <td><?php echo $asignatura ?></td>
                            <td><?php echo $profesor ?></td>
                        </tr>
                <?php } ?>
        </tbody>
    </table>

    <br><br>

    <!-- 
    
    EJERCICIO 02

    Francisco => 3
    Daniel => 5
    Aurora => 10
    Luis => 7
    samuel => 9

    MOSTRAR EN UNA TABLA CON 3 COLUMNAS
     - COLUMNA 1: ALUMNO
     - COLUMNA 2: NOTA
     - COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE, APROBADO

    -->

    <?php
    $notas = [
        "Francisco" => 3,
        "Daniel" => 5,
        "Aurora" => 10,
        "Luis" => 7,
        "Samuel" => 9,
    ];
    ?>

    <table>
        <caption>Notas</caption>
        <thead>
            <tr>
                <th>Alumno</th>                
                <th>Nota</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($notas as $alumno => $nota) { 
                        if ($nota < 5){
                            echo "<tr class='suspenso'>";
                        } else {
                            echo "<tr class='aprobado'>";
                        }
                        ?>
                            <td><?php echo $alumno ?></td>
                            <td><?php echo $nota ?></td>
                            
                                <?php 
                                if ($nota < 5){
                                    echo "<td class='suspenso'>Suspenso</td>";
                                } else {
                                    echo "<td class='aprobado'>Aprobado</td>";
                                }
                                ?>
                            </td>
                        </tr>
                <?php } ?>
        </tbody>
    </table>


</body>
</html>
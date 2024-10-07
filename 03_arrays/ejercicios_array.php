<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Array</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <!-- Mostrar errores en la web -->
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
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

    <h1>Ejercicio 1</h1>
    <?php
    $asignaturas = [
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
            /* Sorting Arrays PHP */
            ksort($asignaturas);

            foreach ($asignaturas as $asignatura => $profesor) { ?>
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


    <h1>Ejercicio 2</h1>

    <?php
    $notas = [
        "Francisco" => 3,
        "Daniel" => 5,
        "Aurora" => 10,
        "Luis" => 7,
        "Samuel" => 9,
        "Juanjo" => 2,
        "Vicente" => 11,
        "Raulito" => 0,
    ];
    ?>

    <table>
        <caption>Notas</caption>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            asort($notas);
            foreach ($notas as $alumno => $nota) {
                if ($nota >= 0 && $nota < 5) {
                    echo "<tr class='suspenso'>";
                } elseif ($nota >= 5 && $nota <= 10) {
                    echo "<tr class='aprobado'>";
                } else {
                    echo "<tr class='suspenso'>";
                }
            ?>
                <td><?php echo $alumno ?></td>
                <td><?php echo $nota ?></td>

                <?php
                if ($nota >= 0 && $nota < 5) {
                    echo "<td>Suspenso</td>";
                } elseif ($nota >= 5 && $nota <= 10) {
                    echo "<td>Aprobado</td>";
                } else {
                    echo "<td>ERROR</td>";
                }
                ?>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br><br>

    <!-- 
    
    Ejercicio 03

    Insertar dos nuevos estudiantes, con notas aleatorias entre 0 y 10.
    Borrar un estudiante (el que peor os caiga) por la clave.
    Mostrar en una tabla todo ordenador por los nombres en orden alfabeticamente inverso.
    Mostrar en una nueva tabla todo ordenado por la nota de 10 a 0 (orden inverso).
    
    -->

    <h1>Ejercicio 3</h1>

    <?php

    $num_alea1 = rand(0,10);
    $num_alea2 = rand(0,10);

    $notas["Paula"] = $num_alea1;
    $notas["Ivan"] = $num_alea2;
    unset($notas["Samuel"]);
    ?>

<table>
        <caption>Notas</caption>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            krsort($notas);
            foreach ($notas as $alumno => $nota) {
                if ($nota >= 0 && $nota < 5) {
                    echo "<tr class='suspenso'>";
                } elseif ($nota >= 5 && $nota <= 10) {
                    echo "<tr class='aprobado'>";
                } else {
                    echo "<tr class='suspenso'>";
                }
            ?>
                <td><?php echo $alumno ?></td>
                <td><?php echo $nota ?></td>

                <?php
                if ($nota >= 0 && $nota < 5) {
                    echo "<td>Suspenso</td>";
                } elseif ($nota >= 5 && $nota <= 10) {
                    echo "<td>Aprobado</td>";
                } else {
                    echo "<td>ERROR</td>";
                }
                ?>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br><br>

    <table>
        <caption>Notas</caption>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            arsort($notas);
            foreach ($notas as $alumno => $nota) {
                if ($nota >= 0 && $nota < 5) {
                    echo "<tr class='suspenso'>";
                } elseif ($nota >= 5 && $nota <= 10) {
                    echo "<tr class='aprobado'>";
                } else {
                    echo "<tr class='suspenso'>";
                }
            ?>
                <td><?php echo $alumno ?></td>
                <td><?php echo $nota ?></td>

                <?php
                if ($nota >= 0 && $nota < 5) {
                    echo "<td>Suspenso</td>";
                } elseif ($nota >= 5 && $nota <= 10) {
                    echo "<td>Aprobado</td>";
                } else {
                    echo "<td>ERROR</td>";
                }
                ?>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>




</body>

</html>
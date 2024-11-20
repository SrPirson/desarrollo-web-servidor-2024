<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Consolas</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
        
        require("conexion.php");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Tabla de consolas</h1>
    <?php
        $sql = "SELECT * FROM consolas";
        $resultado = $_conexion -> query($sql);
        /* 
            Aplicamos la función query a la conexión, donde se ejecuta la sentencia SQL hecha.

            El resultado se almacena en $resultado, que es un objeto con una estructura parecida a los arrays
        */
    ?>
    <table class="table text-center table-bordered border-secundary table-hover table-light">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Fabricante</th>
                <th>Generacion</th>
                <th>Unidades vendidas</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                // $fila ya es un array con dos claves porque guarda todo lo de la tabla
                while ($fila = $resultado -> fetch_assoc()) { // Trata el $resultado como un array asociativo
                    echo "<tr>";
                    echo "<td class='table-success'>" . $fila["nombre"] . "</td>";
                    echo "<td class='table-danger'>" . $fila["fabricante"] . "</td>";
                    echo "<td class='table-warning'>" . $fila["generacion"] . "</td>";
                    if ($fila["unidades_vendidas"] === null) {
                        echo "<td class='table-info'>No hay unidades vendidas</td>";
                    } else {
                        echo "<td class='table-info'>" . $fila["unidades_vendidas"] . "</td>";
                    }
                    
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
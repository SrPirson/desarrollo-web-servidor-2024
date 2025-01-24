<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
</head>
<body>

    <form action="" method="get">
        <div>
            <label>Ciudad</label>
            <input type="text" name="ciudad">
            <input type="submit" value="Buscar">
        </div>
    </form>

    <br>

    <?php 

        $apiUrl = "http://localhost/Ejercicios/07-APIs/estudios/api_estudios.php";
    
        if (!empty($_GET["ciudad"])) {
            $ciudad = $_GET["ciudad"];
            $apiUrl = "$apiUrl?ciudad=$ciudad";
        }

        // Configurar la conexion de a la API
        
        $curl = curl_init(); // Inicializamos la libreria cUrl
        curl_setopt($curl, CURLOPT_URL, $apiUrl); // Indicamos que la conexion va por URL e indicamos la URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Para habilitar la transferencia de datos
        $respuesta = curl_exec($curl);
        curl_close($curl);


        // Pasamos los datos a un array JSON
        $estudios = json_decode($respuesta, true);
        // print_r($estudios);

    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Estudio</th>
                <th>Ciudad</th>
                <th>Año de fundación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudios as $estudio) { ?>
                <tr>
                    <th><?php echo $estudio["nombre_estudio"] ?></th>
                    <th><?php echo $estudio["ciudad"] ?></th>
                    <th><?php echo $estudio["anno_fundacion"] ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>
</body>
</html>
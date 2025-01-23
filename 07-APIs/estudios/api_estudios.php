<?php

// Indicamos que lo que queremos en este fichero es un Json
header("Content-Type: application/json");
include("conexion_pdo.php");

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {
    case "GET":
        manejarGet();
        break;
    
    case "POST":
        manejarPost($entrada);
        break;
    
    case "PUT":
        manejarPut($entrada);
        break;
    
    case "DELETE":
        manejarDelete($entrada);
        break;
    
    default:
        echo json_encode(["metodo" => "otros"]);
        break;
}

function manejarGet() {

    global $_conexion;

    // Si filtramos por un parametro en concreto filtramos por ese parametro
    if (isset($_GET["ciudad"]) && isset($_GET["anno_fundacion"])) {
        $sql = "SELECT * FROM estudios WHERE 
        ciudad = :ciudad,
        anno_fundacion = :anno_fundacion";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "ciudad" => $_GET["ciudad"],
            "anno_fundacion" => $_GET["anno_fundacion"]
        ]);
    } elseif (isset($_GET["anno_fundacion"])) {
        $sql = "SELECT * FROM estudios WHERE anno_fundacion = :anno_fundacion";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "anno_fundacion" => $_GET["anno_fundacion"]
        ]);
    } elseif (isset($_GET["ciudad"])) {
        $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "ciudad" => $_GET["ciudad"]
        ]);
    } else {
        // Si no tiene ningún parametro muestra todo o ningun where.
        $sql = "SELECT * FROM estudios";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
    }
    /* 
        Si tenemos varios parametros pondremos varios if, si tenemos más de 3 o 4 tendremos
        que hacer una inyección dinamica de sql 
    */

    $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);

}

function manejarPost($entrada) {

    global $_conexion;
    $sql = "INSERT estudios(nombre_estudio, ciudad, anno_fundacion) 
        VALUES (:nombre_estudio, :ciudad, :anno_fundacion)";

    $stmt = $_conexion -> prepare($sql);
    $stmt -> execute([
        "nombre_estudio" => $entrada["nombre_estudio"],
        "ciudad" => $entrada["ciudad"],
        "anno_fundacion" => $entrada["anno_fundacion"]
    ]);

    if ($stmt) {
        echo json_encode(["mensaje" => "El estudio se ha insertado correctamente."]);
    } else {
        echo json_encode(["mensaje" => "ERROR: No se ha podido insertar el estudio."]);
    }

}

function manejarDelete($entrada) {

    global $_conexion;
    $sql = "DELETE FROM estudios WHERE nombre_estudio = :nombre_estudio";
    $stmt = $_conexion -> prepare($sql);
    $stmt -> execute([
        "nombre_estudio" => $entrada["nombre_estudio"]
    ]);

    if ($stmt) {
        echo json_encode(["mensaje" => "El estudio se ha borrado correctamente."]);
    } else {
        echo json_encode(["mensaje" => "ERROR: No se ha podido borrar el estudio."]);
    }

}

function manejarPut($entrada){

    global $_conexion;
    $sql = "UPDATE estudios SET
    ciudad = :ciudad,
    anno_fundacion = :anno_fundacion
    WHERE nombre_estudio = :nombre_estudio
    ";
    $stmt = $_conexion -> prepare($sql);
    $stmt -> execute([
        "ciudad" => $entrada["ciudad"],
        "anno_fundacion" => $entrada["anno_fundacion"],
        "nombre_estudio" => $entrada["nombre_estudio"]
    ]);
    if ($stmt) {
        echo json_encode(["mensaje" => "El estudio se ha actualizado correctamente."]);
    } else {
        echo json_encode(["mensaje" => "ERROR: No se ha podido actualizar el estudio."]);
    }
}
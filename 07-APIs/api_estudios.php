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
        echo json_encode(["metodo" => "put"]);
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
    $sql = "SELECT * FROM estudios";
    $stmt = $_conexion -> prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);

}

function manejarPost($entrada) {

    global $_conexion;
    $sql = "INSERT estudios(nombre_estudio, ciudad, anno_fundacion) 
        VALUES (:nombre_estudio, :ciudad, :anno_fundacion)";

    $stmt = $_conexion -> prepare($sql);
    $stmt -> execute([
        "nombre_estudio" => $entrada["nombre_entrada"],
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
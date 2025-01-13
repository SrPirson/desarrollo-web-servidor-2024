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
        echo json_encode(["metodo" => "post"]);
        break;
    
    case "PUT":
        echo json_encode(["metodo" => "put"]);
        break;
    
    case "DELETE":
        echo json_encode(["metodo" => "delete"]);
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

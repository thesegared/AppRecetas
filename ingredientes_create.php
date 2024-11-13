<?php
include 'config.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

$nombre = $data->nombre;
$unidad_medida = $data->unidad_medida;
$valor = $data->valor;

$query = "INSERT INTO ingredientes (nombre, unidad_medida, valor) VALUES (:nombre, :unidad_medida, :valor)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':unidad_medida', $unidad_medida);
$stmt->bindParam(':valor', $valor);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Ingrediente agregado exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al agregar el ingrediente"]);
}
?>

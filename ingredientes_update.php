<?php
include 'config.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$nombre = $data->nombre;
$unidad_medida = $data->unidad_medida;
$valor = $data->valor;

$query = "UPDATE ingredientes SET nombre = :nombre, unidad_medida = :unidad_medida, valor = :valor WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':unidad_medida', $unidad_medida);
$stmt->bindParam(':valor', $valor);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Ingrediente actualizado exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al actualizar el ingrediente"]);
}
?>

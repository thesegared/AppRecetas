<?php
include 'config.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$idIngrediente = $data->idIngrediente;
$cantidad = $data->cantidad;
$descripcion = $data->descripcion;
$idChef = $data->idChef;
$idPlato = $data->idPlato;

$query = "UPDATE recetas SET idIngrediente = :idIngrediente, cantidad = :cantidad, descripcion = :descripcion, idChef = :idChef, idPlato = :idPlato WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':idIngrediente', $idIngrediente);
$stmt->bindParam(':cantidad', $cantidad);
$stmt->bindParam(':descripcion', $descripcion);
$stmt->bindParam(':idChef', $idChef);
$stmt->bindParam(':idPlato', $idPlato);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Receta actualizada exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al actualizar la receta"]);
}
?>

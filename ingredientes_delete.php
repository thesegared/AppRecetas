<?php
include 'config.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

$query = "DELETE FROM ingredientes WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Ingrediente eliminado exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al eliminar el ingrediente"]);
}
?>

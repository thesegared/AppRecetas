<?php
include 'config.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$nombre = $data->nombre;
$apellido = $data->apellido;
$celular = $data->celular;

$query = "UPDATE chefs SET nombre = :nombre, apellido = :apellido, celular = :celular WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellido', $apellido);
$stmt->bindParam(':celular', $celular);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Chef actualizado exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al actualizar el chef"]);
}
?>

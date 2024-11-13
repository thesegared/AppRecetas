<?php
include 'config.php';

header("Content-Type: application/json");

$query = "SELECT id, nombre FROM platos";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>

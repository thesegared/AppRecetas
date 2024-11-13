<?php
include 'config.php';

header("Content-Type: application/json");

$query = "SELECT * FROM ingredientes";
$stmt = $conn->prepare($query);
$stmt->execute();

$ingredientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($ingredientes);
?>

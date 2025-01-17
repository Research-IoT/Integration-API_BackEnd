<?php
require '../../config/config.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$name = isset($input['name']) ? $conn->real_escape_string($input['name']) : null;
$status = isset($input['status']) ? (bool)$input['status'] : null; 

if ($name === null || $status === null) {
    echo json_encode([
        'code' => 400,
        'error' => 'Name and status are required'
    ]);
    $conn->close();
    exit;
}

$sql = "INSERT INTO controllers (name, status) 
        VALUES ('$name', '$status')";

if ($conn->query($sql)) {
    echo json_encode([
        'code' => 201,
        'message' => 'Successfully add controllers!',
    ]);
} else {
    echo json_encode([
        'code' => 500,
        'error' => $conn->error
    ]);
}

$conn->close();
?>

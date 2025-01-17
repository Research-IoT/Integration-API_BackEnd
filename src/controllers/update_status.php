<?php
require '../../config/config.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$id = isset($input['id']) ? intval($input['id']) : null;
$status = isset($input['status']) ? intval($input['status']) : null;

if ($id === null) {
    echo json_encode([
        'code' => 404,
        'error' => 'ID is required'
    ]);
    $conn->close();
    exit;
}

$checkSql = "SELECT id FROM controllers WHERE id='$id'";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows === 0) {
    echo json_encode([
        'code' => 404,
        'error' => 'ID not found in the database'
    ]);
    $conn->close();
    exit;
}

$sql = "UPDATE controllers 
        SET status='$status' 
        WHERE id='$id'";

if ($conn->query($sql)) {
    echo json_encode(['code' => 200, 'message' => 'Controllers updated successfully']);
} else {
    echo json_encode(['code' => 400, 'error' => $conn->error]);
}

$conn->close();
?>

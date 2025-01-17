<?php
require '../../config/config.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$id = $conn->real_escape_string($input['id']);

$sql = "DELETE FROM controllers WHERE id='$id'";

if ($conn->query($sql)) {
    echo json_encode([
        'code' => '404',
        'message' => 'Controllers deleted successfully'
    ]);
} else {
    echo json_encode(['error' => $conn->error]);
}

$conn->close();
?>
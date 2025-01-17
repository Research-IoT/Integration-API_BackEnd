<?php
require '../../config/config.php';

header('Content-Type: application/json');

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id === null) {
    echo json_encode([
        'code' => '404',
        'erro' => 'ID is required'
    ]);
    $conn->close();
    exit;
}

$sql = "SELECT * FROM controllers WHERE id = $id";

$result = $conn->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode([
        'code' => '200',
        'data' => $data
    ]);
} else {
    echo json_encode([
        'code' => '404',
        'error' => 'Data not found'
    ]);
}

$conn->close();
?>

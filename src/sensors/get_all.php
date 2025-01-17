<?php
require '../../config/config.php';

$sql = "SELECT * FROM sensors";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$response = [
    'code' => 200,
    'data' => $data,
];

echo json_encode($response);
$conn->close();
?>
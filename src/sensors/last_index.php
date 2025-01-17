<?php
require '../../config/config.php';

$sql = "SELECT * FROM sensors";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$lastIndex = end($data);

$response = [
    'code' => 200,
    'data' => $lastIndex,
];

echo json_encode($response);
$conn->close();
?>

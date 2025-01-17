<?php
require '../../config/config.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$year = $conn->real_escape_string($input['year']);
$month = $conn->real_escape_string($input['month']);
$day = $conn->real_escape_string($input['day']);
$timestamp = $conn->real_escape_string($input['timestamp']);
$humidity = $conn->real_escape_string($input['humidity']);
$temperature = $conn->real_escape_string($input['temperature']);

$sql = "INSERT INTO sensors (year, month, day, timestamp, humidity, temperature) 
        VALUES ('$year', '$month', '$day', '$timestamp', '$humidity', '$temperature')";

if ($conn->query($sql)) {
    echo json_encode([
        'code' => 201,
        'message' => 'Data sending successfully'
    ]);
} else {
    echo json_encode(['code' => 400,'error' => $conn->error]);
}

$conn->close();
?>

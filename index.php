<?php
header('Content-Type: application/json');

$response = [
    'code' => 200,
    'message' => 'Welcome Dira'
];

echo json_encode($response);
?>

<?php
require_once '../db/config.php';

parse_str(file_get_contents("php://input"), $data);


if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode(['error' => 'Valid user ID is required']);
    http_response_code(400);
    exit;
}

$id = intval($data['id']);


$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);


if ($stmt->execute()) {
    echo json_encode(['message' => 'User deleted successfully']);
} else {
    echo json_encode(['error' => 'Delete failed: ' . $stmt->error]);
    http_response_code(500);
}


$stmt->close();
$conn->close();

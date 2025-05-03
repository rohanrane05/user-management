<?php
require_once '../db/config.php';

// Parse DELETE input (id comes from raw body, not $_GET or $_POST)
parse_str(file_get_contents("php://input"), $data);

// Validate input
if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode(['error' => 'Valid user ID is required']);
    http_response_code(400);
    exit;
}

$id = intval($data['id']);

// Prepare the SQL statement
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Execute and respond
if ($stmt->execute()) {
    echo json_encode(['message' => 'User deleted successfully']);
} else {
    echo json_encode(['error' => 'Delete failed: ' . $stmt->error]);
    http_response_code(500);
}

// Clean up
$stmt->close();
$conn->close();

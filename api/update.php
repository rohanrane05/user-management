<?php
require_once '../db/config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$name = $data['name'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);
$dob = $data['dob'];

$sql = "UPDATE users SET name='$name', email='$email', password='$password', dob='$dob' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'User updated successfully']);
} else {
    echo json_encode(['error' => 'Error: ' . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>
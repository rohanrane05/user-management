<?php
require_once '../db/config.php';

$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);
$dob = $data['dob'];

$sql = "INSERT INTO users (name, email, password, dob) VALUES ('$name', '$email', '$password', '$dob')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'User created successfully']);
} else {
    echo json_encode(['error' => 'Error: ' . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>
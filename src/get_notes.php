<?php
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "notes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM notes ORDER BY created_at DESC";
$result = $conn->query($sql);

$notes = [];
while ($row = $result->fetch_assoc()) {
    $notes[] = $row;
}

$conn->close();

header("Content-Type: application/json");
echo json_encode($notes);
?>
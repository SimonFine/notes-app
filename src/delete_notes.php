<?php
header('Content-Type: application/json'); 

$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "notes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note_id = $_POST["id"];

    if (!empty($note_id) && is_numeric($note_id)) {
        $stmt = $conn->prepare("DELETE FROM notes WHERE id = ?");
        $stmt->bind_param("i", $note_id);

        if ($stmt->execute()) {
            
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Failed to delete note."]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Invalid note ID."]);
    }
}

$conn->close();
?>
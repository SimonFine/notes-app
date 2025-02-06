<?php
$servername = "db";
$username = "root"; 
$password = "rootpassword"; 
$dbname = "notes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $content = $_POST["content"];
    
    if (!empty($content)) {
        $stmt = $conn->prepare("INSERT INTO notes (content) VALUES (?)");
        $stmt->bind_param("s", $content);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>
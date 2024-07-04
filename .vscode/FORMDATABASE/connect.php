<?php
$servername = "localhost";
$username = "your_username";
$password = "7umgjz";
$dbname = "forms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

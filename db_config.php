<?php
$servername = "localhost";
$username = "root";  // Default username in XAMPP
$password = "";      // Default password is empty
$dbname = "financial_tracker";  // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

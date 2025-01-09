<?php
// Database connection (replace with your own credentials)
$host = "localhost";  // Your database server
$username = "root";         // Your database username
$password = "";             // Your database password
$database = "cantik";  // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



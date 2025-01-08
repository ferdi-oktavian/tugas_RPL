<?php
// Database connection (replace with your own credentials)
$servername = "localhost";  // Your database server
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "cantik";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get data from the images table
$sql = "SELECT id, name, image FROM images";
$result = $conn->query($sql);
?>

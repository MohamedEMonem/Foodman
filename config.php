<?php
$host = 'localhost';
$port = 3306;
$username = 'root';
$password = 'admin';
$database = 'foodman';

// Create a connection using $conn instead of $mysqli
$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

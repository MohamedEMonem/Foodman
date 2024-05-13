<?php
$host = 'localhost';
$port = 3306;
$username = 'root';
$password = 'admin';
$database = 'foodman';

try {
    $conn = new mysqli($host, $username, $password, $database, $port);
} catch (Exception $e) {
    // Handle the exception
    echo "Error: could not connect to Database. Please try again later.";
    exit;
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

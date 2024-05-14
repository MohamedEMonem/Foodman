<?php
session_start();
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['Logged']) && $_SESSION['Logged']) {
    $email = $_SESSION['email'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT email, name, phone, created_at FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user data is fetched
    if ($user) {
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'User not found']);
    }
} else {
    // Return a 401 Unauthorized status code if the user is not logged in
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

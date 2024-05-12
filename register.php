<?php
require_once('config.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = filter_input(INPUT_POST, 'first-name' . ' ' . 'last-name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($email) || empty($password) || empty($fullname) || empty($phone)) {
        echo 'Please fill out all fields.';
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.';
        exit;
    }
    $sql = "SELECT email FROM users where email = $email";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    if ($email == $row['email']) {
        echo 'Email already exists.';
        exit;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email,name,phone, password) VALUES ('$email', '$password')";
    $mysqli->query($sql);
    $_SESSION['Logged'] = true;
    header("Location: index.html");
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: register.html");
}

<?php
require_once('config.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($email) || empty($password)) {
        echo 'Please fill out all fields.';
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.';
        exit;
    }

    $sql = "SELECT email , password FROM users where email = $email";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password']) && $email == $row['email']) {
        $_SESSION['Logged'] = true;
        header("Location: index.html");
    } else {
        echo 'Invalid email or password.';
        header("Location: login.html");
    }
}

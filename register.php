<?php
require_once('config.php');
include('config.php');
session_start();

if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($phone)) {
        echo 'Please fill out all fields.';
        echo '<a href="Signup.html">Go back</a>';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.';
        exit;
    }

    $sql = "SELECT email,phone FROM users WHERE email = '$email' OR phone = '$phone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo 'Email already exists.';
        exit;
    }

    $fullname = $fname . ' ' . $lname;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, name, phone, password) VALUES ('$email', '$fullname', '$phone', '$password')";
    $conn->query($sql);

    $_SESSION['Logged'] = true;
    $_SESSION['phone'] = $phone;
    header("Location: index.html");
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: register.html");
}

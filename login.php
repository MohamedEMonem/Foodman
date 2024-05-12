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

    // Prepare the statement
    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
    $stmt->bind_param('s', $email); // Bind the parameter

    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result(); // Get the result set

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password']) && $email == $row['email']) {
            $_SESSION['Logged'] = true;
            header("Location: index.html");
        } else {
            echo 'Invalid email or password.';
            header("Location: login.html");
        }
    } else {
        echo 'User not found.';
        header("Location: login.html");
    }

    $stmt->close(); // Close the statement
}

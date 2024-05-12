<?php
session_start();

try {
    if (isset($_SESSION['Logged']) && $_SESSION['Logged']) {
        header("Location: menu.html");
        exit; // Make sure to exit after redirection
    }
} catch (Exception $e) {
    // Handle exceptions if needed
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="signup.css">

</head>

<body>

    <header>
        <a href="index.html">
            <h1 id="foodman">FoodMan</h1>
        </a>
    </header>

    <section class="form">
        <p>Sign Up</p>
        <form id="signupform" method="POST" action="register.php">

            <label for="first-name">First Name</label>
            <input class="name" type="text" name="fname" id="first-name" required>

            <label for="last-name">Last Name</label>
            <input class="name " type="text" name="lname" id="last-name" required><br><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required><br><br>
            <!-- style this element -->
            <!-- style this element -->
            <label for="confirmpassword">Confirm Password</label>
            <input class="CON-PASS" type="password" name="confirm-password" id="confirmpassword" required><br><br>
            <label for="mobilephone">Mobile Phone</label>
            <input type="tel" name="phone" id="mobilephone" required><br><br>
            <p id="errormessage"></p>

            <button type="submit">Sign Up</button><br><br><br>
            <!-- don't change script place -->
            <script src="validation.js"></script>
            <!-- don't change script place -->

        </form>

        <a href="#">Need Help?</a>
        <hr>
        <a class="CNA" href="LoginPage.php">Already have an account? Login</a>
        <br><br>
        <br><br>
    </section>

</body>

</html>
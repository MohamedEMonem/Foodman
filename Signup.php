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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="signup.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body>
    <header>
        <br><br>
        <a href="index.html">
            <div class="foodman">
                <h1><span id="s1">Food</span>Man</h1>
            </div>
        </a>
    </header>

    <section class="form">
        <p style="padding-bottom: 3rem; font-weight:700; font-size :x-large">Sign Up</p>
        <form id="signupform" method="POST" action="register.php">

            <input class="name" type="text" name="fname" id="first-name" placeholder="First Name" required>

            <input class="name " type="text" name="lname" id="last-name" placeholder="Last Name" required>

            <input type="email" name="email" id="email" placeholder="Email" required>

            <input type="password" name="password" id="password" placeholder="Password" required>
            <!-- style this element -->
            <!-- style this element -->
            <input class="CON-PASS" type="password" name="confirm-password" id="confirmpassword" placeholder="Confirm Password" required>

            <input type="tel" name="phone" id="mobilephone" placeholder="Mobile Phone" required>
            <p id="errormessage"></p>

            <button type="submit">Sign Up</button><br><br><br>
            <!-- don't change script place -->
            <script src="validation.js"></script>
            <!-- don't change script place -->

        </form>

        <a href="contact.html" style="text-decoration: none;">Need Help?</a><br><br>
        <hr>
        <br>
        <a class="CNA" href="LoginPage.php" style="text-decoration: none;">Already have an account? Login</a>
        <br><br>
        <br><br>
    </section>

</body>

</html>
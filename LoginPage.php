<?php
session_start();

try {
    if ($_SESSION['Logged']) {
        header("Location: notFound.html");
        exit; // Make sure to exit after redirection
    }
} catch (Exception $e) {
    // Handle exceptions if needed
}
?>


<!-- Your HTML code here -->
<div class="login-page">
    <link rel="stylesheet" href="login.css">
    </head>

    <body>

        <header>
            <a href="index.html">
                <h1>FoodMan</h1>
            </a>
        </header>

        <section class="form">
            <p>Sign In</p>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required><br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required><br><br><br>
                <button type="submit">Login</button><br><br><br>
            </form>
            <a href="#">Need Help?</a>
            <hr>
            <a class="CNA" href="Signup.php">Create New Account</a>
            <br><br>
        </section>

    </body>

    </html>
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



<!-- Your HTML code here -->
<div class="login-page">

    <head>
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="login.css">
    </head>

    <body>

        <header>
            <div class="logo nav__logo">
                <a href="index.html">Food<span>man</span></a>
            </div>
        </header>

        <section class="form">
            <p>Sign In</p>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"><br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password"><br><br><br>
                <?php
                $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_SPECIAL_CHARS);
                if (isset($_GET['error'])) {
                    if ($error == 'email') {
                        echo "<p class=\"error\" style=\"color: red;\"><strong>Email not found</strong></p>";
                    } elseif ($error == 'password') {
                        echo "<p class=\"error\" style=\"color: red;\"><strong>Invaild Password</strong></p>";
                    } elseif ($error == 'emptyfields') {
                        echo "<p class=\"error\" style=\"color: red;\"><strong>Fill in all fields</strong></p>";
                    } elseif ($error == 'invalidemail') {
                        echo "<p class=\"error\" style=\"color: red;\"><strong>Invalid Email</strong></p>";
                    }
                }
                ?>
                <button type="submit">Login</button><br><br><br>
            </form>
            <a href="#">Need Help?</a>
            <hr>
            <a class="CNA" href="Signup.php">Create New Account</a>
            <br><br>
        </section>

    </body>

    </html>
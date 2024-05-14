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
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    </head>

    <body>
        <header>
        </header>

        <div class="logo nav__logo" style="font-family: Poppins, sans-serif; text-align:center;">
            <a href="index.html" style="font-size: 32px;">Food<span>man</span></a>
        </div>


        <section class="form">
            <p style="padding-bottom: 3rem; font-weight:700; font-size :x-large">Sign In</p>
            <form action="login.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email"><br><br>
                <input type="password" name="password" id="password" placeholder="password"><br><br><br>
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
            <a href="contact.html">Need Help?</a><br><br>
            <hr>
            <br>
            <a class="CNA" href="Signup.php">Create New Account</a>
            <br><br>
        </section>

    </body>

    </html>
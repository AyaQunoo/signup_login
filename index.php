<?php
require_once "includes/config_session.inc.php";

require_once "includes/signup_view.inc.php";

require_once "includes/login_view.inc.php";

?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Registration Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Login</header>
            <form action="/includes/login.inc.php" method="post">
                <input type="text" placeholder="Enter your username" name="username">
                <input type="password" placeholder="Enter your password" name="password">
                <a href="#">Forgot password?</a>
                <input type="submit" class="button" value="Login" name="submit">
            </form>
            <?php
            check_login_errors();
            ?>
            <div class="signup">
                <span class="signup">Don't have an account?
                    <label for="check">Signup</label>
                </span>
            </div>
        </div>
        <div class="registration form">
            <header>Signup</header>
            <form action="/includes/signup.inc.php" method="post">
                <input type="text" placeholder="Enter your name" name="username">
                <input type="text" placeholder="Enter your email" name="email">
                <input type="password" placeholder="Create a password" name="password">
                <input type="submit" class="button" value="Signup" name="submit">
            </form>
            <?php
            check_signup_errors();
            ?>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label for="check">Login</label>
                </span>
            </div>
        </div>
    </div>
</body>

</html>
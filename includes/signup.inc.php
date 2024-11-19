<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    try {
        require_once "dph.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // handle errors 
        $errors = [];
        if (is_input_empty($username, $email, $pwd)) {
            $errors['empty_input'] = "fill in all fields!!";
        }
        if (is_email_invalid($email)) {
            $errors['invalid_email'] = "invalid email !!";
        }
        if (get_username($connection, $username)) {
            $errors['username_taken'] = "username already exists!";
        }
        if (is_email_registerd($connection, $email)) {
            $errors['email_used'] = "email is already registered!!";
        }
        require_once "config_session.inc.php";
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $signup_data = [
                "username" => $username,
                "password" => $pwd,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signup_data;
            header("location:../index.php");
            die();
        }
        create_user($connection,  $email,  $pwd, $username);
        header("location:../index.php?signup=success");
        $connection = null;
        $stmt = null;
        die();
    } catch (PDOException  $e) {

        die("Query failed" . $e->getMessage());
    }
} else {
    header("location:../index.php");
    die();
}

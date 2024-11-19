<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST['password'];
    try {
       

     
        require_once "dph.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // handle errors 
        $errors = [];
        $result = get_user($connection, $username);
        if (is_input_empty($username, $pwd)) {
            $errors['empty_input'] = "fill in all fields!!";
        }

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "incorrect login info!";
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["password"])) {
            $errors["login_incorrect"] = "incorrect login info!";
        }

        require_once "config_session.inc.php";
        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("location:../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION['last_regeneration'] = time();
        header("location:../home.php?login=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("query error" . $e->getMessage());
    }
} else {
    header("location:../index.php");
    die();
}

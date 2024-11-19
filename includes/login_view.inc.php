<?php

function  check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {

        $errors = $_SESSION["errors_login"];
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION["errors_login"]);
    } elseif (isset($Get["login"]) && $_GET["login"] = "success") {
        echo "loged in succesfully";
    }
}

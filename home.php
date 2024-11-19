<?php
require_once "includes/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/includes/logout.inc.php" method="post">

        <input type="submit" class="button" value="logout" name="submit">
    </form>
    <?php
    session_start();
    if (isset($_SESSION["user_id"])) {
        echo "welcome home " . $_SESSION["user_username"];
    } else {
        echo "your not logged in !!";
    }




    ?>
</body>

</html>
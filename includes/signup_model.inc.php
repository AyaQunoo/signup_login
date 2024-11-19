<?php

function get_username(object $pdo, string $username)
{
    $query = "SELECT username From users where username =:username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo, string $email)
{
    $query = "SELECT username FROM users where email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo, string $email, string $pwd, string $usename)
{
    $query = "INSERT INTO users (email,password,username) VALUES (:email,:pwd,:username);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":username", $usename);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

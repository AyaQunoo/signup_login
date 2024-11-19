<?php

function is_input_empty(string $username, string $email, string $pwd)
{
    if (empty($username) || empty($email) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}
function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}
function is_email_registerd(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
function create_user(object $pdo, string $email, string $pwd, string $usename)
{
  set_user( $pdo,  $email,$pwd,  $usename);
}

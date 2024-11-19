<?php

$server = 'localhost';
$dbname = 'register';
$dbusername = 'root';
$dbpassword = '';

try {
    $connection = new PDO("mysql:host=$server;dbname=$dbname", $dbusername, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (ErrorException $e) {
    die("connection failed:" . $e->getMessage());
}

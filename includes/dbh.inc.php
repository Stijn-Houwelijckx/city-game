<?php

$host = "localhost";
$dbName = "city_game_copy";
$dbUser = "root";
$dbPwd = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
<?php

$host = 'localhost';
$dbname = 'web';  // sesuaikan dengan nama database yang ada di php my admin
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host = $host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Tidak dapat tersambung : " . $e->getMessage());
}

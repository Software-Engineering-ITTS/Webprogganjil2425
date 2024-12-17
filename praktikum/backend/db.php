<?php
$host = 'localhost';
$dbname = 'praktikumphp';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host; dbname=$dbname",
        username:$username,
        password:$password
    );
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    die("Tidak dapat tersambung" . $e->getMessage());
}
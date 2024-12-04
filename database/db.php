<?php
$host = 'localhost';
$dbname = 'phpproject';
$username = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host; dbname=$dbname", username: $username, password: $password);
  $pdo->setAttribute(
    attribute: PDO::ATTR_ERRMODE,
    value: PDO::ERRMODE_EXCEPTION
  );
} catch (PDOException $e) {
  die("Tidak dapat tersambung :" . $e->getMessage());
}
?>
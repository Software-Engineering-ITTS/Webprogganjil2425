<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'php');
define('DB_PORT', '3307');
define('DB_USER', 'root');
define('DB_PWD', '');

$dsn = "mysql:host=" . DB_HOST . ";port=".DB_PORT.";dbname=" . DB_NAME . ";charset=utf8";
try {
    $pdo = new PDO($dsn, DB_USER, DB_PWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>

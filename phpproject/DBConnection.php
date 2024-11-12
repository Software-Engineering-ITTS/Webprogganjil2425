<?php
require 'config.php'; //memuat file konfigurasi
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=UTF8"; // perintah koneksi dengan database
try {
    $pdo = new PDO($dsn, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
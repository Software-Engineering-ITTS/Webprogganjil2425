<?php
$host = 'localhost';
$dbname = 'phpproject';
$username = 'root';
$password = '';

try {
    // Membuat koneksi menggunakan PDO
    $pdo = new PDO("mysql:host=$host, dbname=$dbname", 
    $username, 
    $password);
    // Mengatur mode error agar menampilkan Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    // Menangkap error jika koneksi gagal
    die('Error: ' . $e->getMessage());
}

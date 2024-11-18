<?php
// Konfigurasi database
$host = "localhost"; // Nama host atau IP server
$username = "root"; // Username database
$password = ""; // Password database
$dbname = "manajemen proyek"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil!";
?>

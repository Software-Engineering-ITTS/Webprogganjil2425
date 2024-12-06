<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, OPTIONS, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user"; // Ganti dengan nama database Anda
$port = "3307";

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data JSON dari request
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $data['nama'] ?? null;
    $nim = $data['nim'] ?? null;

    // Validasi data
    if (!$nama || !$nim) {
        http_response_code(400);
        echo json_encode(["message" => "Nama dan NIM diperlukan."]);
        exit;
    }

    if (strlen($nim) < 8) {
        http_response_code(400);
        echo json_encode(["message" => "NIM harus memiliki minimal 8 karakter."]);
        exit;
    }

    // Query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO users (Nama, NIM) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama, $nim);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["message" => "Data berhasil disimpan."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Terjadi kesalahan saat menyimpan data."]);
    }

    $stmt->close();
} else {
    http_response_code(405);
    echo json_encode(["message" => "Metode tidak diizinkan."]);
}

$conn->close();
?>

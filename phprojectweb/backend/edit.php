<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$nim = $data->nim;
$nama = $data->nama;
$status = "AKTIF";

// Ubah SQL statement untuk melakukan update
$sql = 'UPDATE user SET nama = ?, status = ? WHERE nim = ?';
$statement = $pdo->prepare($sql);

// Eksekusi statement dengan parameter yang baru
$statement->execute([$nama, $status, $nim]);

// Cek apakah ada baris yang terpengaruh
if ($statement->rowCount() > 0) {
    echo json_encode(['message' => "Data berhasil diperbarui"]);
} else {
    echo json_encode(['message' => "Data tidak ditemukan atau tidak ada perubahan"]);
}
?>
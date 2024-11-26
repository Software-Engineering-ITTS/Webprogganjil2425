<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$data = json_decode(file_get_contents("php://input"));


$userid = $data->userid;
$nim = $data->nim;
$nama = $data->nama;

$sql = 'UPDATE user SET nim = :nim, nama = :nama WHERE userid = :id';
$statement = $pdo->prepare($sql);
$statement->execute([':nim' => $nim, ':nama' => $nama, ':id' => $userid]);

echo json_encode(['message' => "Data berhasil diubah"]);

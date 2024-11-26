<?php

header(header: "Access-Control-Allow-Origin: http://localhost:5173 ");
header(header: "Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header(header: "Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$nim = $data -> nim;
$nama = $data -> nama;
$status = "AKTIF";

$sql = 'INSERT INTO user(nim, nama, status) VALUES (?,?,?)';
$statement = $pdo -> prepare ($sql);
$statement -> execute ([':nim' => $nim, ':nama' => $nama, ':ststus' => $status]);

echo json_encode (['message' => "Data berhasil disimpan"]);
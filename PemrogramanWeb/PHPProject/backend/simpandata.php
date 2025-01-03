<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$nim = $data->nim;
$nama = $data->nama;
$status = "AKTIF";

$sql = "INSERT INTO user (nim,nama,status) VALUES (?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nim,$nama,$status]);

echo json_encode(['message' => 'User created succesfully']);
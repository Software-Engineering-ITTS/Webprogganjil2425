<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$data = json_decode(json: file_get_contents(filename: "php://input"));
$nim = $data->nim;
$nama = $data->nama;
$status = "AKTIF";

$sql = 'insert into user(nim, nama, status) values(?,?,?)';
$statement = $pdo->prepare($sql);
$statement->execute([$nim,$nama,$status]);

echo json_encode(value: ['message' => "Data berhasil disimpan"]);
    

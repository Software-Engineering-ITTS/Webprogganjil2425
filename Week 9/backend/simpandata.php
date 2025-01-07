<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: aplication/json");


include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$userid = $data->userid;
$nim = $data->nim;
$nama = $data->nama;
$status = "AKTIF";

if (empty($userid)) {
    $sql = 'INSERT INTO user (nim, nama, status) VALUES (?, ?, ?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$nim, $nama, $status]);
} else {
    $sql = 'UPDATE user SET nim = ?, nama = ? WHERE userid = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute([$nim, $nama, $userid]);
}

?>
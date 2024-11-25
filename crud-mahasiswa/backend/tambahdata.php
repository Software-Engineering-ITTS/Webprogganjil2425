<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$data = json_decode(json: file_get_contents("php://input"));
$userid = $data->userid;
$nim = $data->nim;
$nama = $data->nama;
$status = "AKTIF";

if($userid == ''){
    $sql = 'insert into user(NIM, Nama, STATUS) values(?,?,?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$nim,$nama,$status]);

    echo json_encode(['message' => "Data Berhasil Disimpan!"]);
} else {
    $sql = 'UPDATE user SET NIM = ?, Nama = ? WHERE UserID = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute([$nim, $nama, $userid]);
    
    echo json_encode(['message' => "Data Berhasil Diupdate!"]);
}
?>
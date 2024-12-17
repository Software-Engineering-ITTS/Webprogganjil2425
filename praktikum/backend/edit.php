<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200); // Preflight berhasil
    exit;
}

include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$userid = $data->userid;
$nama = $data->nama;
$nim = $data->nim;

$sql = 'UPDATE user SET nama = ?, nim = ? WHERE userid = ?';
$statement = $pdo->prepare($sql);
$statement->execute([$nama, $nim, $userid]);

?>
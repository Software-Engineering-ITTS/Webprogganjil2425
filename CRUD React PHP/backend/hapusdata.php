<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: aplication/json");

include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$userid = $data->userid;

$sql = 'DELETE FROM user where userid = ?';
$statement = $pdo->prepare($sql);
$statement->execute([$userid]);

echo json_encode(['message' => "Data berhasil dihapus"]);
?>
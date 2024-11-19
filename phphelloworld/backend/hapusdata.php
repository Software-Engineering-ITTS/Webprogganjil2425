<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('db.php');

$data = json_decode(file_get_contents("php://input"));
$userid = $data->userid;

$sql = 'DELETE FROM user WHERE userid = :id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);
$statement->execute();
echo json_encode(['message' => "Hapus Data Berhasil"]);

?>

<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('db.php');

$data = json_decode(file_get_contents("php://input"));
$userid = $data->userid;
$sql = 'SELECT * FROM user WHERE userid = :id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);

// $statement = $pdo -> query($sql);

$statement -> execute();
$data = $statement -> fetch();

echo json_encode($data);

?>
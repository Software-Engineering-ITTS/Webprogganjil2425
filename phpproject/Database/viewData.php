<?php 

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$sql = 'SELECT * FROM user';
$sql = $statement->query($sql);
$sql->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($data);
// echo json_encode($data);
echo json_encode($data);


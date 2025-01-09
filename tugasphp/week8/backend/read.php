<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('db.php');

$sql = 'select * FROM mhs';
$statement =$pdo->query($sql);
$statement->execute();
$data = $statement ->fetchAll(PDO::FETCH_ASSOC);

// var_dump($data);
echo json_encode($data);
?>
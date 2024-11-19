<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include("db.php");
$sql = 'select * from user';
$statement = $pdo->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>
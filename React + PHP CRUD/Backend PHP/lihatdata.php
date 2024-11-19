<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$sql = 'SELECT * FROM user';

$statemant = $pdo->query($sql);
$statemant->execute();
$data = $statemant->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(value: $data);
?>
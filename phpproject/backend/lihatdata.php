<?php

header(header: "Access-Control-Allow-Origin: http://localhost:5173 ");
header(header: "Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header(header: "Access-Control-Allow-Headers: Content-Type");

include 'db.php';
$sql = 'SELECT * FROM user';
$statement = $pdo->query($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($data);
echo json_encode($data);
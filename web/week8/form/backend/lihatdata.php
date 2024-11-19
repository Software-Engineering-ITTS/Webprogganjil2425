<?php 

include 'db.php';

$sql = 'SELECT * FROM user';
$statement = $pdo->query($sql);
$statement = $pdo->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump ($data);

echo json_encode($data);


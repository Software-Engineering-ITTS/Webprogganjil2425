<?php
include 'db.php';

$sql = 'select  * from user';
$statement = $pdo->query($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
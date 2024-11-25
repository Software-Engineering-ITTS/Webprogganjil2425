<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include 'db.php';
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $userid = $data['userid'];

    $sql = 'DELETE FROM user WHERE userid = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute(params: [$userid]);

    echo json_encode(['message' => 'Hapus Berhasil']);

?>
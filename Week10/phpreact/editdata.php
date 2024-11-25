<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include 'db.php';

    $data = json_decode(file_get_contents("php://input"));
    
    if (isset($data->userid) && isset($data->nim) && isset($data->nama)) {
        $userid = $data->userid;
        $nim = $data->nim;
        $nama = $data->nama;

        $sql = "UPDATE user SET nim = :nim, nama = :nama WHERE userid = :userid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nim' => $nim, ':nama' => $nama, ':userid' => $userid]);

        echo json_encode(["message" => "User updated successfully"]);
    }
?>
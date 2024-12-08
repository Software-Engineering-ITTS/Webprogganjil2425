<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';


$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

$sql ='DELETE FROM mhs WHERE id = ?';

$statement = $pdo->prepare($sql);
// $statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute([$id]);
// if ($statement->execute()) {
//     echo "hapus";
// } else {
//     echo "ggl hapus";
// }

echo json_encode(['message'=>"alhadmdulillah data terhapus"]);
?>
<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

$data = json_decode(file_get_contents("php://input"));      
$nim = $data->nim;
$nama = $data->nama;
$status = "aktif" ;

$sql = 'insert into mhs(nim, nama, status) values(?,?,?)';
$statement = $pdo -> prepare($sql);
$statement->execute([$nim,$nama,$status]); //{
//     # code...
//     echo "data nyimpen "; 
// }else{
//     echo "data ga nyimpen ";
// }

echo json_encode(['message' => "AlhamduLIllah data tersimpan"]);
?>
<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



include('db.php');

$data = json_decode(file_get_contents("php://input"));

$userid = $data->userid;
$nim = $data->nim;
$nama = $data->nama;
$status = "AKTIF";

if($userid != null){
    $sql = 'UPDATE user SET `nim`=:nim, `nama`=:nama WHERE userid=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $userid, PDO::PARAM_INT);
    $statement->bindParam(':nim', $nim, PDO::PARAM_STR);
    $statement->bindParam(':nama', $nama, PDO::PARAM_STR);

    $statement -> execute();
}else{
    $sql = 'insert into user ( nim, nama, status) values(?, ?, ?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$nim, $nama, $status]);
}


echo json_encode(['message' => "Tambah Data Berhasil"]);
?>

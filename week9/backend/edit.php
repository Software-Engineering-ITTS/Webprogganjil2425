<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';


$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$nama = $data->nama;
$nim = $data->nim;


$sql = 'update mhs set `nim`=:nim, `nama`=:nama where id=:id';

// $sql ='DELETE FROM mhs WHERE id = ?';

$statement = $pdo->prepare($sql);

try {
    $statement->execute([$nim,$nama,$id]);
    if ($statement->rowCount()>0) {
        # code...
        echo json_encode(['message'=>"alhadmdulillah data terhapus"]);
    } else {
        # code...
        echo json_encode(['message'=>'gada yang berubah']);
    }

        //code...
} catch (\Throwable $th) {
    //throw $th;
    echo json_encode(['message'=>'edit gagal', 'eror'=> $th->getMessage()]);
}

?>
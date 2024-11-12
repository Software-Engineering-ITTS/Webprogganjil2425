<?php
include("DbConnection.php"); 

$nim = $_POST['txt_nim'];
$nama = $_POST['txt_nama'];
$status = 'AKTIF';
// echo  "NIM: ". $nim;
// echo "<br/>";
// echo "NAMA: " . $nama;
// echo "<br/>";
// var_dump($pdo)

$sql = 'insert into user ( nim, nama, status) values(?, ?, ?)';
$statement = $pdo->prepare($sql);

if($statement -> execute([$nim, $nama, $status])){
    echo "data tersimpan!";
}else{
    echo "data gagal tersimpan!";
}

?>
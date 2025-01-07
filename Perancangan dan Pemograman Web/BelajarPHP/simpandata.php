<?php
include ("DBConnection.php");
$nim = $_POST['txt_nim'];
$nama = $_POST['txt_name'];
$status = 'AKTIF';
// echo $NIM;
// echo "<br/>";
// echo $"NAMA;".$nama;
// echo "<br/>";
// var_dump($pdo);

$sql = 'insert into user (nim, nama, status) values (?, ?, ?)';
$statment = $pdo->prepare($sql);
if($statment->execute([$nim, $nama, $status])){
    echo "Data Tersimpan";
}else{
    echo "Data Gagal Disimpan";
}

?>
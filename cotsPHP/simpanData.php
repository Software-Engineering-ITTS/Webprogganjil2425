<?php
include("dataBase/Koneksi.php");
include("header.php");
// $id= $_POST['id'];

$nama = $_POST['txt_name'];
$nisn = $_POST['txt_nisn'];
$nilai = $_POST['nilai_sem'];
$kelas = $_POST['kelas'];
$hari = $_POST['fav_hari'];
$pengalaman = $_POST['txt_pengalaman'];
$mapel = $_POST['fav_mapel'];
$fasilitas = $_POST['fasilitas'];
$asal= $_POST['asal'];


// if ($id=='') {
    $sql = 'insert into pelajar(nama, nisn, nilai, kelas, hariFav, pengalaman, mapel, fasilitas, asal) values(?,?,?,?,?,?,?,?,?)';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$nama, $nisn, $nilai, $kelas, $hari, $pengalaman, $mapel, $fasilitas, $asal])) { //need to finish
        echo "berhasil menambah data";
    } else {
        echo "gagal menambah data";
    }
// } else{
//     $sql = 'update pelajar set... where id=:id'; //need to 
//     $statement = $pdo->prepare($sql);

// }



?>
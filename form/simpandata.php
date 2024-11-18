<?php
include("DBConnection.php");
include("header.php");
$username = $_POST['username'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];
$keterangan = $_POST['keterangan'];
$barang = $_POST['barang'];
$transaksi = $_POST['transaksi'];
// echo "NIM: ".$nim;
// echo "<br/>";
// echo "NAMA:".$nama;
// echo "<br/>";
// var_dump($pdo);

    $sql = 'insert into toko(username, password, jabatan, keterangan, barang, transaksi) values(?,?,?,?,?,?)';
    $statement = $pdo->prepare($sql);
    if($statement->execute([$username,$password,$jabatan,$keterangan,$barang,$transaksi])){
        echo "data tersimpan!";
    }else{
        echo "data gagal tersimpan!";       
    }


include("footer.php");
?>
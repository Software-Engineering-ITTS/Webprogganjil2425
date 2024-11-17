<?php
include("DBConnection.php");
include("header.php");
$nim = $_POST['txt_nim'];
$nama = $_POST['txt_nama'];
$password = $_POST['txt_password'];
$alasan = $_POST['txt_alasan'];
$alamat = $_POST['txt_alamat'];
$gender = $_POST['gender'];
$prodi = $_POST['prodi'];

$tipe = (!empty($_POST['izin']) ? 'izin':(!empty($_POST['sakit']) ? 'sakit': (!empty($_POST['dispen']) ? 'dispen': 'kosong')));


    $sql = 'insert into perizinan(nim, nama, password, alasan, alamat, gender, prodi, tipe) values(?,?,?,?,?,?,?,?)';
    $statement = $pdo->prepare($sql);
    if($statement->execute([$nim,$nama,$password,$alasan,$alamat,$gender,$prodi,$tipe])){
        echo "data tersimpan!";
    }else{
        echo "data gagal tersimpan!";       
    }


include("footer.php");
?>
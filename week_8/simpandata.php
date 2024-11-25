<?php
include("DBConnection.php");
include("header.php");
$userid = $_POST['userid'] ?? ''; 
$nim = $_POST['txt_nim'];
$nama = $_POST['txt_nama'];
$status = 'AKTIF';
// echo "NIM: ".$nim;
// echo "<br/>";
// echo "NAMA:".$nama;
// echo "<br/>";
// var_dump($pdo);
if($userid==''){
    $sql = 'insert into user(nim, nama, status) values(?,?,?)';
    $statement = $pdo->prepare($sql);
    if($statement->execute([$nim,$nama,$status])){
        echo "data tersimpan!";
    }else{
        echo "data gagal tersimpan!";       
    }
}else{
    $sql = 'UPDATE user SET `nim`=:nim, `nama`=:nama WHERE userid=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $userid, PDO::PARAM_INT);
    $statement->bindParam(':nim', $nim,PDO::PARAM_STR);
    $statement->bindParam(':nama', $nama,PDO::PARAM_STR);    
    if($statement->execute()){
        echo "data terupdate!";
    }else{
        echo "data gagal terupdate!";       
    }
}

include("footer.php");
?>
<?php 
include("DBConnection.php");
include("heder.php");

$userid = $_POST[txt_nim];
$nim = $_POST[txt_nim];
$nama = $_POST[txt_nama];
$status = 'Aktif';

if ($userid=='') {
    $sql = 'insert into user(nim, nama, status) values(?,?,?)';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$nim, $nama, $status])) {
        echo "data tersimpan";
    }else {
        echo "data gagal tersimpan";
    }
}else{
    $sql = 'UPDATE user SET `nim`=:nim, `nama`=:nama WHERE userid=:id';
    $statement = $pdo->preapare($sql);
    $statement->bindParam(':nim',$userid,PDO::PARAM_INT);
    $statement->bindParam(':nim',$nim,PDO::PARAM_INT);
    $statement->bindParam(':nim',$nama,PDO::PARAM_INT);
    if ($statement->execute()) {
        echo "data berhasil di update";
    }else {
        echo "data gagal di update";
    }
}

include("footer.php");
?>
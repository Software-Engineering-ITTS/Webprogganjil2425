<?php 
include("DBConnection.php");
include("header.php");
$userid = $_POST['userid'];
$nim = $_POST['txt-nim'];
$nama = $_POST['txt-nama'];
$status = 'Aktif';
// echo "NIM: ".$nim;
// echo "<br/>";
// echo "NAMA: ".$nama;
// var_dump($pdo)

if ($userid=='') {
    $sql = "INSERT INTO user(nim, nama, status) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$nim, $nama, $status])) {
        echo "Data Tersimpan!";
    } else {
        echo "Data gagal tersimpan!";
    } 
} else {
    $sql = 'UPDATE user SET `nim`=:nim, `nama`=:nama WHERE userid=:id'; 
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $userid, PDO::PARAM_INT);
    $statement->bindParam(':nim', $nim, PDO::PARAM_STR);
    $statement->bindParam(':nama', $nama, PDO::PARAM_STR);
    if($statement->execute()) {
        echo "Data terupdate!";
    } else {
        echo "Data terupdate!";
    }
}

include("footer.php")
?>
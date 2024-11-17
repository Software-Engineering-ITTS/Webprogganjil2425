<?php
include("DBConnection.php");
include("header.php");

$userid = $_GET['userid'];

$sql = 'DELETE FROM user WHERE userid = :id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);

if ($statement->execute()) {
    echo 'Hapus Berhasil';
} else {
    echo 'Hapus Gagal';
}
include("footer.php");
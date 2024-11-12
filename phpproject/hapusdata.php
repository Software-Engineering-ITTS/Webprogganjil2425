<?php
include("DBConnection.php");
include("header.php");

$userid = $_GET['userid'];
$sql = 'delete from user where userid = :id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);

if ($statement->execute()) {
    echo 'Hapus berhasil';
} else {
    echo 'Hapus gagal';
}

include("footer.php");
?>
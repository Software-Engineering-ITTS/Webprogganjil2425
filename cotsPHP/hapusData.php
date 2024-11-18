<?php
include("dataBase/Koneksi.php");
include("header.php");
$id = $_GET['id'];

$sql = 'delete from pelajar where id =:id';
$statement = $pdo ->prepare($sql);
$statement -> bindParam(':id', $id, PDO::PARAM_INT);

if ($statement->execute()) {
    echo "pelajar berhasil di hapus";
} else {
    echo "data gagal dihapus";
}

?>
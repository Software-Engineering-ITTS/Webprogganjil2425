<?php
include("DBConnection.php");

$id = $_GET['id'];
$sql = 'DELETE FROM konsultasi WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);

if ($statement->execute()) {
    echo "Data telah dihapus!";
} else {
    echo "Gagal menghapus data";
}
?>
<a href="lihatdata.php">Kembali</a>
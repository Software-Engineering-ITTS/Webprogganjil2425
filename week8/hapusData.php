<?php
include ("DBConnection.php");
include("header.php");
$id = $_GET['id'];

$sql ='DELETE FROM mhs WHERE id = :id';

//prepare statement for execution
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);

if ($statement->execute()) {
    # code...
    echo "hapus";
} else {
    # code...
    echo "ggl hapus";
}
include("footer.php");

?>
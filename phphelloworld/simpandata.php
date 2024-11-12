<?php
include("DbConnection.php"); 

$nim = $_POST['txt_nim'];
$nama = $_POST['txt_nama'];
echo  "NIM: ". $nim;
echo "<br/>";
echo "NAMA: " . $nama;
echo "<br/>";
var_dump($pdo)
?>
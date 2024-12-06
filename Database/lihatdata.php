<?php
include("config.php");

$nama = $_POST['txt_nama'];
$nim = $_POST['txt_nim'];
$password = $_POST['txt_password']; // Pastikan kolom `status` benar

$sql = 'INSERT INTO user(nama, nim, Password) VALUES(?, ?, ?)';
$statement = $pdo->prepare($sql);

if ($statement->execute([$nama, $nim, $password])) {
    echo "Data Berhasil Disimpan";
} else {
    echo "Data Gagal Disimpan";
}
?>

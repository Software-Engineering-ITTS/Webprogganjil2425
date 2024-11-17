<?php
include("DBkoneksi.php");
include("header.php");
$idkaryawan = $_POST['idkaryawan'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$alamat = $_POST['alamat'];
$karyawan = $_POST['karyawan'];
$penyakit = $_POST['penyakit'];
$gol = $_POST['gol'];
$BB = $_POST['BB'];
$TB = $_POST['TB'];

echo "NIM: ".$idkaryawan;
echo "<br/>";
echo "NAMA: ".$password;
echo "<br/>";
var_dump($pdo);

$sql = 'insert into user(idkaryawan, password, nama, kelamin, alamat, karyawan, penyakit, gol, BB, TB) values(?,?,?,?,?,?,?,?,?,?)';
$statement = $pdo->prepare($sql);
if ($statement->execute([$idkaryawan,$password, $nama, $kelamin, $alamat, $karyawan, $penyakit,$gol,$BB,$TB])) {
    echo "Data tersimpan";
} else {
    echo "Data Gagal tersimpan";
}

include("footer.php");

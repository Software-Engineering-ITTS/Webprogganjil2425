<?php
include("DBConnection.php");

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_kelahiran = $_POST['tempat_kelahiran'];
$gender = $_POST['gender'];
$umur = $_POST['umur'];
$keluhan = $_POST['keluhan'];
$kondisi = $_POST['kondisi'];
$konsultasi = $_POST['konsultasi'];

if (empty($id)) {
    $sql = "INSERT INTO konsultasi (nama, alamat, tempat_kelahiran, gender, umur, keluhan, kondisi, konsultasi)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$nama, $alamat, $tempat_kelahiran, $gender, $umur, $keluhan, $kondisi, $konsultasi])) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data!";
    }
} else {
    $sql = "UPDATE konsultasi SET nama = ?, alamat = ?, tempat_kelahiran = ?, gender = ?, umur = ?, keluhan = ?, kondisi = ?, konsultasi = ?
            WHERE id = ?";
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$nama, $alamat, $tempat_kelahiran, $gender, $umur, $keluhan, $kondisi, $konsultasi, $id])) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>
<a href="lihatdata.php">Kembali</a>
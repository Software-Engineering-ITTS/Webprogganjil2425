<?php
include("DbConnection.php");



// Collect the form data
$id_barang = $_POST['txtIdBarang'] ?? '';
$kode_barang = $_POST['txtKodeBarang'] ?? '';
$nama_barang = $_POST['txtNamaBarang'] ?? '';
$kategori_barang = $_POST['category'] ?? '';
$tanggal_diterima = $_POST['inpDateDiterima'] ?? '';
$tanggal_expired = $_POST['inpDateExp'] ?? '';
$ketersediaan = $_POST['availability'] ?? '';
$stock_barang = $_POST['inpStockBarang'] ?? '';
$gudang_penyimpanan = $_POST['gudang'] ?? '';
$catatan_tambahan = $_POST['catatan-tambahan'] ?? '';
$verifikasi_pegawai = $_POST['inpVerifikasiPegawai'] ?? '';


echo "idBarang : ";
var_dump($id_barang);

echo "\nkodeBarang : ";
var_dump($kode_barang);

echo "\nnamaBarang : ";
var_dump($nama_barang);

echo "\nkategori: ";
var_dump($kategori_barang);

echo "\ntanggal diterma: ";
var_dump($tanggal_diterima);

echo "\ntanggal expired: ";
var_dump($tanggal_expired);

echo "\nketersediaan: ";
var_dump($ketersediaan);

echo "\nstock barang: ";
var_dump($stock_barang);

echo "\ngudang: ";
foreach($_POST['gudang'] as $selected){
    var_dump($selected);
}

echo "\ncatatan: ";
var_dump($catatan_tambahan);

echo "\nverifikasi: ";
var_dump($verifikasi_pegawai);
?>
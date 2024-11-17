<?php
include("DbConnection.php");

// Collect the form data
$id_barang = $_POST['txtIdBarang'] ?? '';
$kode_barang = $_POST['txtKodeBarang'] ?? '';
$nama_barang = $_POST['txtNamaBarang'] ?? '';
$kategori_barang = $_POST['category'] ?? '';
$tanggal_diterima = $_POST['inpDateDiterima'] ?? '';
$tanggal_expired = $_POST['inpDateExp'] ?? 'NULL';
$ketersediaan = $_POST['availability'] ?? '';
$stock_barang = $_POST['stockBarang'] ?? '';
$gudang_penyimpanan = ""; //$_POST['gudang'] ?? '';
$catatan_tambahan = $_POST['catatan-tambahan'] ?? '';
$verifikasi_pegawai = $_POST['inpVerifikasiPegawai'] ?? '';


// echo "idBarang : ";
// var_dump($id_barang);

// echo "\nkodeBarang : ";
// var_dump($kode_barang);

// echo "\nnamaBarang : ";
// var_dump($nama_barang);

// echo "\nkategori: ";
// var_dump($kategori_barang);

echo "\ntanggal diterma: ";
var_dump($tanggal_diterima);

echo "\ntanggal expired: ";
var_dump($tanggal_expired);

// echo "\nketersediaan: ";
// var_dump($ketersediaan);

echo "\nstock barang: ";
var_dump($stock_barang);

// echo "\ngudang: ";
foreach($_POST['gudang'] as $selectedGudang){
    $gudang_penyimpanan .= $selectedGudang . ";";    
}
// var_dump($gudang_penyimpanan);

// echo "\ncatatan: ";
// var_dump($catatan_tambahan);

// echo "\nverifikasi: ";
// var_dump($verifikasi_pegawai);
// $tanggal_diterima =  date("Y-m-d H:i:s", strtotime($tanggal_diterima));

// if($tanggal_expired != 'NULL'){
//     $tanggal_expired =   date("Y-m-d H:i:s", strtotime($tanggal_expired));
// }


if ($id_barang == '') {
    $sql = 'INSERT into InventarisBarang ( kode_barang, nama_barang, kategori_barang, tanggal_diterima, tanggal_expired, status_available, stock, gudang_penyimpanan, catatan, no_verifikasi_pegawai) values(?, ?, ?, ?,?,?,?,?,?,?)';
    $statement = $pdo->prepare($sql);


    if ($statement->execute([$kode_barang, $nama_barang, $kategori_barang, $tanggal_diterima, $tanggal_expired, $ketersediaan, $stock_barang, $gudang_penyimpanan, $catatan_tambahan, $verifikasi_pegawai])) {
        echo "data tersimpan!";
        header("Location: index.php");
        exit;
    } else {
        echo "data gagal tersimpan!";
    }
} else {
    $sql = 'UPDATE InventarisBarang 
    SET `nama_barang` = :nama, 
        `kategori_barang` = :kategori, 
        `tanggal_diterima` = :tanggal_diterima, 
        `tanggal_expired` = :tanggal_expired, 
        `status_available` = :status_available, 
        `stock` = :stock, 
        `gudang_penyimpanan` = :gudang, 
        `catatan` = :catatan, 
        `no_verifikasi_pegawai` = :verifikasi 
    WHERE id_barang = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id_barang, PDO::PARAM_INT);
    $statement->bindParam(':nama', $nama_barang, PDO::PARAM_STR);
    $statement->bindParam(':kategori', $kategori_barang, PDO::PARAM_STR);
    $statement->bindParam(':tanggal_diterima', $tanggal_diterima, PDO::PARAM_STR);
    $statement->bindParam(':tanggal_expired', $tanggal_expired, PDO::PARAM_STR);
    $statement->bindParam(':status_available', $ketersediaan, PDO::PARAM_STR);
    $statement->bindParam(':stock', $stock_barang, PDO::PARAM_INT);
    $statement->bindParam(':gudang', $gudang_penyimpanan, PDO::PARAM_STR);
    $statement->bindParam(':catatan', $catatan_tambahan, PDO::PARAM_STR);
    $statement->bindParam(':verifikasi', $verifikasi_pegawai, PDO::PARAM_STR);
    

    if ($statement->execute()) {
        echo "data terupdate!";
        header("Location: index.php"); //?status=success&action=update");
        exit;
    } else {
        echo "data gagal terupdate!";
        header("Location: index.php");
        // exit;
    }
    // update
}

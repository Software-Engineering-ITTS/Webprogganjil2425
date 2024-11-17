<?php   
    include 'koneksi.php';

    $nama = $_POST['nama_pemesan'];
    $gender = $_POST['tipe_gender'];
    $penerbangan = $_POST['tipe_terbang'];
    $waktu = $_POST['tipe_waktu'];
    $bandara_asal = $_POST['bandara_asal'];
    $bandara_tujuan = $_POST['bandara_tujuan'];
    $maskapai = $_POST['nama_maskapai'];
    $harga = $_POST['jumlah_harga'];
    $jumlah_kursi = $_POST['jumlah_kursi'];
    $nomor_kursi = implode(", ", $_POST['nomor_kursi']);
    $tambahan = $_POST['kebutuhan_tambahan'];
    $pin = $_POST['pin_password'];

    $sql = "INSERT INTO infopemesan (nama, gender, penerbangan, waktu, bandara_asal, bandara_tujuan, maskapai, harga, jumlah_kursi, nomor_kursi, tambahan, pin)
    VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($koneksi);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL Error: ". mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "sssssssiisss"
    , $nama, $gender, $penerbangan, $waktu, $bandara_asal, $bandara_tujuan, $maskapai, $harga, $jumlah_kursi, $nomor_kursi, $tambahan, $pin);

    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data gagal disimpan: ". mysqli_error($koneksi);
    }
?>  
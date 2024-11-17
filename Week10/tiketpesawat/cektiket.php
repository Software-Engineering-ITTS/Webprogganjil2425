<?php
include 'koneksi.php';
include 'header.php';
?>

<?php
$sql = 'select * from infopemesan';
$statement = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan Tiket</title>
    <link rel="stylesheet" href="tiket2.css">
</head>
<body>
    <h1>Data Pemesanan Tiket</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Gender</th>
                <th>Jenis Penerbangan</th>
                <th>Waktu Penerbangan</th>
                <th>Bandara Asal</th>
                <th>Bandara Tujuan</th>
                <th>Maskapai</th>
                <th>Harga</th>
                <th>Jumlah Kursi</th>
                <th>Nomor Kursi</th>
                <th>Kebutuhan Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($statement->num_rows > 0): ?>
                <?php $no = 1; ?>
                <?php while ($row = $statement->fetch_assoc()): ?>
                    <tr>
                    <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td><?= $row['penerbangan']; ?></td>
                        <td><?= $row['waktu']; ?></td>
                        <td><?= $row['bandara_asal']; ?></td>
                        <td><?= $row['bandara_tujuan']; ?></td>
                        <td><?= $row['maskapai']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td><?= $row['jumlah_kursi']; ?></td>
                        <td><?= $row['nomor_kursi']; ?></td>
                        <td><?= $row['tambahan']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="12">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
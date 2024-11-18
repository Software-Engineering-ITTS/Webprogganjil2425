<?php 
require 'function.php';

$assesment2 = query("SELECT * FROM assesment2");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Monitoring System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Security Monitoring System</h2>

<a href="tambah.php">laporkan kejadian aneh</a>
<a href="index.php">Kembali ke menu utama</a>

<table border="1" cellpadding="10" cellspacing="0" id="activityTable">

    <tr>
        <th>No.</th>
        <th>Area</th>
        <th>Kejadian</th>
        <th>Status</th>
        <th>Jenis Laporan</th> 
        <th>Waktu</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ( $assesment2 as $row ) :?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["area"]; ?></td>
        <td><?= $row["kejadian"]; ?></td>
        <td><?= $row["status"]; ?></td>
        <td><?= $row["jenis_laporan"]; ?></td>
        <td><?= $row["jam"]; ?></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
</table>
</body>
</html>

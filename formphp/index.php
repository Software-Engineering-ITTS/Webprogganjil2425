<?php
include 'connection.php';

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<html>
<head>
    <title>Gaji Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Daftar Gaji Karyawan</h1>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Karyawan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Absensi</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Gaji Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['jabatan']; ?></td>
                        <td><?= $row['absensi']; ?></td>
                        <td>Rp<?= number_format($row['tunjangan'], 2); ?></td>
                        <td>Rp<?= number_format($row['potongan'], 2); ?></td>
                        <td>Rp<?= number_format($row['gaji_total'], 2); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Belum ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
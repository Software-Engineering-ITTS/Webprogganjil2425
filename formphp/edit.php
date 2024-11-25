<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username  = $_POST['username'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama      = $_POST['nama'];
    $tanggal   = $_POST['tanggal'];
    $gender    = $_POST['gender'];
    $jabatan   = $_POST['jabatan'];
    $kendaraan = implode(', ', $_POST['kendaraan'] ?? []);
    $absensi   = $_POST['absensi'];
    $tunjangan = $_POST['tunjangan'];
    $potongan  = $_POST['potongan'];

    $gaji_total = ($absensi * 50000) + $tunjangan - $potongan;

    $sql = "INSERT INTO employees (username, password, nama, tanggal, gender, jabatan, kendaraan, absensi, tunjangan, potongan, gaji_total) 
            VALUES ('$username', '$password', '$nama', '$tanggal', '$gender', '$jabatan', '$kendaraan', $absensi, $tunjangan, $potongan, $gaji_total)";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<html>
<head>
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Tambah Karyawan</h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
            <input type="radio" name="gender" value="Perempuan" required> Perempuan
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-control" required>
                <option value="CEO">CEO</option>
                <option value="Direktur">Direktur</option>
                <option value="Manager">Manager</option>
                <option value="Karyawan">Karyawan</option>
                <option value="OB">OB</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Absensi</label>
            <input type="number" name="absensi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tunjangan</label>
            <input type="number" name="tunjangan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Potongan</label>
            <input type="number" name="potongan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
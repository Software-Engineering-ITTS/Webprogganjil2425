<?php 

require 'function.php';

if ( isset($_POST["submit"]) ) {
    if( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('Laporan Telah Terkirim');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Laporan Gagal Dikirim');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

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

<a href="index.php">Kembali ke menu utama</a>

<form action="" method="post" enctype="multipart/form-data">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required><br>

    <label for="gender">Jenis kelamin:</label>
    <input type="radio" id="laki" name="gender" value="Laki-laki" required>
    <label for="laki">Laki-laki</label>
    <input type="radio" id="perempuan" name="gender" value="Perempuan" required>
    <label for="perempuan">Perempuan</label><br>

    <label for="jenis_laporan">Jenis Laporan:</label>
    <select id="jenis_laporan" name="jenis_laporan" required>
        <option value="Kejadian Keamanan">Kejadian Keamanan</option>
        <option value="Gangguan Layanan">Gangguan Layanan</option>
        <option value="Kecelakaan">Kecelakaan</option>
    </select><br>

    <label for="kejadian">Kejadian:</label>
    <textarea name="kejadian" rows="4" id="kejadian" placeholder="Laporkan kejadian..." required></textarea><br>

    <label for="area">Area:</label>
    <textarea name="area" rows="4" id="area" placeholder="Tulis Area..." required></textarea><br>

    <button type="submit" name="submit">Lapor!</button>
</form>

</body>
</html>

<?php
include("DBConnection.php");
include("header.php");

$id = $_GET['id'];
$sql = 'SELECT * FROM konsultasi WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$data = $statement->fetch();
?>
<h1>Edit Data Konsultasi</h1>
<form action="simpandata.php" method="POST">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
    <br>

    <label>Alamat</label>
    <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
    <br>

    <label>Tempat Kelahiran</label>
    <textarea name="tempat_kelahiran" required><?= $data['tempat_kelahiran'] ?></textarea>
    <br>

    <label>Gender</label>
    <input type="radio" name="gender" value="Laki-Laki" <?= $data['gender'] == 'Laki-Laki' ? 'checked' : '' ?>> Laki-Laki
    <input type="radio" name="gender" value="Perempuan" <?= $data['gender'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan
    <br>

    <label>Umur</label>
    <input type="text" name="umur" value="<?= $data['umur'] ?>" required>
    <br>

    <label>Keluhan</label>
    <textarea name="keluhan" required><?= $data['keluhan'] ?></textarea>
    <br>

    <label>Kondisi</label>
    <input type="text" name="kondisi" value="<?= $data['kondisi'] ?>" required>
    <br>

    <label>Konsultasi</label>
    <input type="radio" name="konsultasi" value="Ya" <?= $data['konsultasi'] == 'Ya' ? 'checked' : '' ?>> Ya
    <input type="radio" name="konsultasi" value="Tidak" <?= $data['konsultasi'] == 'Tidak' ? 'checked' : '' ?>> Tidak
    <br>

    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="submit" value="Update">
</form>
<?php include("footer.php"); ?>
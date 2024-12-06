<?php include("header.php")?>
<link rel="stylesheet" href="tambahdata.css">
<h1>Tambah Data</h1>
<div>
    <form action="lihatdata.php" method="POST" id="form-user" name="form-user">
        <label for="Nama">Nama</label>
        <input type="text" id="Nama" name="txt_nama" required>
        <br>
        <br>
        <label for="NIM">NIM</label>
        <input type="text" id="NIM" name="txt_nim" required>
        <br>
        <br>
        <label for="Password">Password</label>
        <input type="text" id="Password" name="txt_password" required>
        <br>
        <br>
        <button type="reset" id="Reset">Reset</button>
        <button type="submit"  id="Submit">Simpan</button>
    </form>
</div>
<?php include("footer.php")?>
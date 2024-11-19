<?php include("heder.php"); ?>
<h1>Tambah Data</h1>
<div>
    <form id="form-user" name="form-user" action="simpanData.php" method="POST">
        <label>NIM : </label>
        <input type="text" name="txt_nim" />
        <label>NAMA : </label>
        <input type="text" name="txt_nim" />
        <input type="reset" name="reset" />
        <input type="submit" name="simpan" />
    </form>
</div>

<?php include("footer.php"); ?>
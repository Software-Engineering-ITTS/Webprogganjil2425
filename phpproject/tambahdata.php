<?php
include("header.php")
?>
<h1>Tambah Data</h1>
<div>
    <form id="form-user" name="form-user" action="simpandata.php" method="post">
        <label>NIM :</label>
        <input type="text" name="txt_nim" /><br><br>
        <label>Nama :</label>
        <input type="text" name="txt_nama" /><br><br>
        <input type="reset" value="Reset" />
        <input type="submit" value="Simpan" />
    </form>
</div>
<?php
include("footer.php")
?>
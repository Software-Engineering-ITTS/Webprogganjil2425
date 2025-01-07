<?php include("header.php")?>
<h1>Tambah Data</h1>
<div>
    <form action="simpandata.php" id="form-user" name="form-user" method="POST">
        <label for="">NIM : </label>
        <input type="text" name="txt_nim"/> <br> <br>

        <label for="">Nama : </label>
        <input type="text" name="txt_nama"/> <br> <br>

        <input type="reset" value="reset"/>
        <input type="submit" value="simpan"/>

    </form>
</div>
<?php include("footer.php");?>
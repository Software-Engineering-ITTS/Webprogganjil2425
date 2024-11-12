<?php include("header.php"); ?>
<h1>Tambah Data</h1>
<div>
    <form
        action="simpandata.php"
        method="POST"
        id="form-user"
        name="form-user">

        <label for="">NIM :</label>
        <input type="text" name="txt_nim" id="" />

        <br>

        <label for="">Nama :</label>
        <input type="text" name="txt_nama" id="" />

        <br>
        <input type="reset" name="" id="" value="reset" />
        <input type="submit" name="" id="" value="simpan" />


    </form>
</div>
<?php include("footer.php"); ?>
<?php include("header.php");?>
<h1>Tambah Data</h1>
<div>
    <form id="form-user" name="form-user" action="simpandata.php" method="POST">
        <label> NIM : </label>
        <input type= "text" name="txt_nim"/>

        <label> NAMA : </label>
        <input type= "text" name="txt_nama"/>
        <input type= "reset" value="reset"/>

        <input type="submit" value="simpan"/>
    </form>
</div>
<?php include("footer.php");?>
<?php include("header.php");?>
<h1>Tambah Data</h1>
<div>
    <form id="form-user" 
    name="form-user"
    action="simpandata.php"
    method="POST">
    
    <label>NIM :</label>
    <input type="text" name="txt_nim">
    <label>Nama :</label>
    <input type="text" name="txt_nama">
    <input type="submit" value="simpan">
    <input type="reset" value="reset">
    </form>
</div>
<?php include("footer.php");?>
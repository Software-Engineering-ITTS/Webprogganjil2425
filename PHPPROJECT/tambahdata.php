<?php include("header.php"); ?>
<h1>
    Tambah data
</h1>
<div>
    <form id="form-user" 
    name="form-user" 
    action="simpandata.php" 
    method="POST" >

    <div>
            <ul>
                <li><a href="tambahdata.php">Tambah Data</a></li>
                <li><a href="lihatdata.php">Lihat Data</a></li>
            </ul>
        </div>
        
    <label for="">NIM:</label>
    <input type="text" name="txt_nim"/>
    <label for="">Nama:</label>
    <input type="text" name="txt_nama"/>
    <input type="reset" value="Reset"/>
    <input type="submit" value="Simpan"/>
    </form>
</div>
<?php include("footer.php"); ?>
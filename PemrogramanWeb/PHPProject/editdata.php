<?php 
include("DBConnection.php");
include("header.php");
$userid=$_GET['userid'];
$sql = 'select * from user where userid=:id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);
$statement->execute();
$data = $statement->fetch();
// var_dump($data);
?>
<h1>Tambah Data</h1>
<div>
    <form id="form-user" name="form-user" action="simpandata.php" method="POST">
    <label>NIM :</label>
    <input type="text" name="txt_nim" value="<?=$data['nim']?>"/>
    <label>Nama :</label>
    <input type="text" name="txt_nama" value="<?=$data['nama']?>"/>
    <input type="reset" value="reset" />
    <input type="submit" value="<?=($userid?'update':'save')?>" />
    <input type="hidden" name="userid" value="<?=$userid?>"/>    
    </form>
</div>
<?php include("footer.php");?>
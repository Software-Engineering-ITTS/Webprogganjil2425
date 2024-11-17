<?php
include("DBConnection.php");
include("header.php");
$userid = $_GET ['userid'];
$sql = 'select * from user where userid=:id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);
$statement->execute();
$data = $statement->fetch();

?>
<h1>Edit Data</h1>
<div>
<form id="form-user" name="form-user" action="simpandata.php" method="POST">
    <label for="">NIM :</label>
    <input type="text" name="txt-nim" value="<?=$data['nim']?>"/>
    <label for="">Nama :</label>
    <input type="text" name="txt-nama" value="<?=$data['nama']?>"/>
    <input type="reset" value="reset">
    <input type="submit" value="<?=($userid?'update':'save')?>"/>
    <input type="hidden" name="userid" value="<?=$userid?>"/>
    </form>
</div>
<?php
include("footer.php");
?>
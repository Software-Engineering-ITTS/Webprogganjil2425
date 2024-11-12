<?php
include("DBConnection.php");
include("header.php");

$userid = $_GET['userid'];
$sql = 'select * from user where userid = :id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);
$statement->execute();
$data = $statement->fetch();
?>

<h1>Edit Data</h1>
<div>
    <form id="form-user" name="form-user" action="simpandata.php" method="post">
        <label>NIM :</label>
        <input type="text" name="txt_nim" value="<?= $data['nim'] ?>" /><br><br>
        <label>Nama :</label>
        <input type="text" name="txt_nama" value="<?= $data['nama'] ?>" /><br><br>
        <input type="reset" value="Reset" />
        <input type="submit" value="<?= ($userid? 'Update' : 'Save') ?>" />
        <input type="hidden" name="userid" value="<?= $userid ?>" />
    </form>
</div>

<?php
include("footer.php");
?>
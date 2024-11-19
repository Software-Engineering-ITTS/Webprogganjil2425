<?php 
include(DBConnection.php);
include("header.php");
$userid = $_GET['userid'];
$sql = 'SELECT * FROM user where userid=:id';
$statement = $pdo->preapare($sql);
$statement->bindParam(':id',$userid, PDO::PARAM_INT);
$statement-> excute();
$data = $statement->fetch();

?>

<h1>Edit User</h1>

<div>
    <form id="form-user" name="form-user" action="simpanData.php" method="POST">
        <label>NIM : </label>
        <input type="text" name="txt_nim" value="<?=$data['nim']?>" />
        <label>NAMA : </label>
        <input type="text" name="txt_nim" value="<?$data['nama']?>"/>
        <input type="reset" name="reset" />
        <input type="submit" value="<?($userid?'update':'save')?>"/>
        <input type="hidden" name="userid" value="<?=$userid?>"/>
        
    </form>
</div>

<?php include("footer.php");?>

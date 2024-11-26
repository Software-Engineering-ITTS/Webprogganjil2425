<?php
include ("DBConnection.php");
include("header.php");
$userid=$GET['userid'];
$sql ='select * FROM user where userid=id';
$statement = $pdo -> query($sql);
$data = $statement -> fetch();
$statement = $pdo->prepare($sql);
$statement ->bindParam(':id', $userid, PDO ::PARAM_INT);
$statement->execute();
$data = $statement->fetch();
?>

<h1>edit data</h1>
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
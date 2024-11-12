<?php 
include("DbConnection.php");
include("header.php"); 

$userid = $_GET['userid'];

$sql = 'SELECT * FROM user WHERE userid = :id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $userid, PDO::PARAM_INT);
$statement->execute();
$data = $statement->fetch();
// var_dump($data);
?>
<h1>Edit Data</h1>
<div>
    <form
        action="simpandata.php"
        method="POST"
        id="form-user"
        name="form-user">

        <label for="">NIM :</label>
        <input type="text" name="txt_nim" id="" value="<?=$data['nim']?>"/>

        <br>

        <label for="">Nama :</label>
        <input type="text" name="txt_nama" id="" value="<?=$data['nama']?>"/>

        <br>
        <input type="reset" name="" id="" value="reset" />
        <input type="submit" name="" id="" value="simpan" />


    </form>
</div>
<?php include("footer.php"); ?>
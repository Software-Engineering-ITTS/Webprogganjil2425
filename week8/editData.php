<?php

include("DBConnection.php");
include("header.php");
// $id =1;
$id  = $_GET['id'];
// $nama = $_POST['txt_nama'];
// $status = 'AKTIF';
// echo "NIm: ".$nim;
// echo "<br/>";
// echo "NamaP ".$nama;
// echo "<br/>";

// var_dump($pdo);

$sql = 'select * from mhs WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement -> bindparam(':id', $id, PDO::PARAM_INT);
$statement -> execute();
$data=$statement->fetch(); ?>

<h1>Tambah Data</h1>

<div>
    <form action="simpandata.php" id="form-user" name="form-user" action="simpandata.php"method="POST">
        <label for="">nim</label>
        <input type="text" name="txt_nim" value="<?=$data['nim']?>"/>
        <label for="">nama</label>
        <input type="text" name="txt_nama" value="<?=$data['nama']?>"/>
        <input type="reset" value="reset"/>
        <input type="submit" value="<?=($id?'update':'save')?>"/>
        <input type="hidden" name="id" value="<?=$id?>"/>

    </form>
</div>
<!-- 
if ($statement->execute([$nim, $nama, $status])) {
    # code...
    echo "data simpan";
} else {
    # code...
    echo "gaskesimpen";
}
include("footer.php"); -->


<?php include("footer.php"); ?>
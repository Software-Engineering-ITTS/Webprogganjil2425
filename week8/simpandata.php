<?php
include("DBConnection.php");
include("header.php");
$id = $_POST['id'];
$nim = $_POST['txt_nim'];
$nama = $_POST['txt_nama'];
$status = 'AKTIF';
// echo "NIm: ".$nim;
// echo "<br/>";
// echo "NamaP ".$nama;
// echo "<br/>";

// var_dump($pdo);

if ($id=='') {
    # code...
    $sql = 'insert into mhs(nim, nama, status) values(?,?,?)';
    $statement = $pdo -> prepare($sql);
    if ($statement->execute([$nim,$nama,$status])) {
        # code...
        echo "data nyimpen "; 
    }else{
        echo "data ga nyimpen ";
    }
}else{
    $sql = 'update mhs set `nim`=:nim, `nama`=:nama where id=:id';
    $statement = $pdo -> prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':nim', $nim, PDO::PARAM_STR);
    $statement-> bindParam(':nama', $nama, PDO::PARAM_STR);
    if ($statement->execute()) {
        # code...
        echo "ws update";
    } else {
        # code...
        echo "ga ke update  ";
    }
    

}

// $sql = 'insert into mhs(nim, nama, status) values(?,?,?)';
// $statement = $pdo->prepare($sql);
// if ($statement->execute([$nim, $nama, $status])) {
//     # code...
//     echo "data simpan";
// } else {
//     # code...
//     echo "gaskesimpen";
// }
include("footer.php");
?>
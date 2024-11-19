<?php 
include("DBConnection.php");
include("heder.php");
$userid = $_GET["userid"];
$sql = "DELETE FORM user WHERE userid = :id";
$statement = $pdo->preaper($sql);
$statement->bindParam(":id",$userid, PDO::PARAM_INT);

if ($statement->execute()) {
    echo 'hapus Berhasil yeaayy';
}else {
    echo 'hapus Gagal, coba lagi nanti';
}
include("footer.php");
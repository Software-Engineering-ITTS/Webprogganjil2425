<?php 
$host = 'localhost';
$dbname = 'phpprojek';
$username = 'root';
$password = '';

// require 'Koneksi.php'; //file koneksi
$dsn = "mysql:host=".$host.";dbname=".$dbname.";charset=UTF8"; //memulai koneksi 

try {
    $pdo = new PDO($dsn,$username, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //throw $th;
    die("tidak dapat tersambung : ".$e->getMessage() );
    // echo ;
}

?>
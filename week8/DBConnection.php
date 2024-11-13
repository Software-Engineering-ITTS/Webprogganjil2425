<?php 
require 'Koneksi.php'; //file koneksi
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8"; //memulai koneksi 

try {
    $pdo = new PDO($dsn, DB_USER, DB_PWD);
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
}

?>
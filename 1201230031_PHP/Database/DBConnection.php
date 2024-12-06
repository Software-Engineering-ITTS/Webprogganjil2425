<?php
require 'config.php'; //memuat file konfigurasi
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTf=8";//perintah koneksi
try{
    $pdo = new PDO($dsn,DB_USER,DB_PWD);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
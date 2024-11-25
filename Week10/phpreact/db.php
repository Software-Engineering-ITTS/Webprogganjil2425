<?php 
try {
    $host = "localhost";
    $dbname = "phpproject";
    $username = "root";
    $password = "";
    
    $pdo = new PDO("mysql:host=$host; dbname=$dbname" , $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("Tidak dapat tersambung :" . $e->getMessage());
}
?>
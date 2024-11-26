<?php


$host = 'localhost';
$dbname = 'web';
$username = 'root';
$password = 'terrafel*1';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("tidak tersambung". $e->getMessage());
}
?>
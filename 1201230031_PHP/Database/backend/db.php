<?php
$host = 'localhost';
$dbname = 'php';
$username = 'root';
$password = '';
$port = '3307';

try{
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("gaisok nyambung cok : $dbname". $e->getMessage());
}
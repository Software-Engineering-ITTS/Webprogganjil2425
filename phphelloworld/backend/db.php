<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'seta');
define('DB_PWD', 'ayamgoyeng');
define('DB_NAME', 'phpproject');

$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
try{
    $pdo = new PDO($dsn, DB_USER, DB_PWD);
}catch(PDOException $e){
    echo $e -> getMessage();
    die("Tidak Dapat tersambung :".$e->getMessage());
}
?>
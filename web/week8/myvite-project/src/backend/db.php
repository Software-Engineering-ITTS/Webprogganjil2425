<?php

$host = $_SERVER[""];
$dbname = "";
$username = "";
$password = "";

try {
  $pdo = new PDO ("mysql : host = $host, dbname = $dbname", 
  $username,
  $password,
  );

} catch (PDOException $e) {
  die("Tidak dapat tersambung". $e->getMessage());

}
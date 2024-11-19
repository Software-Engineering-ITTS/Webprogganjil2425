<?php 

$host = 'localhost';
$dbname = 'phpproject';
$username = 'root';
$password = '';

try {

    $pdo = new PDO
    (
        dsn: "mysql:host=$host; 
           dbname=$dbname" , 
           username: $username,  
           password: $password 
        );
    
    $pdo->setAttribute(
        attribute: PDO::ATTR_ERRMODE,
        value: PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
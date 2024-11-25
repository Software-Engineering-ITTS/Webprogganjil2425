<?php
include 'connection.php';

$id = $_GET['id'];

// Query untuk menghapus data
$sql = "DELETE FROM employees WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
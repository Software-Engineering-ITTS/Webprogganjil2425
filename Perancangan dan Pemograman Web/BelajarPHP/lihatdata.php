<?php include('DBConnection.php');?>
<?php include("header.php");?>
<h1>Tabel data user</h1>
<table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Operasi</th>
    </tr>
<?php
// var_dump($pdo);'
$sql = 'select  * from user';
$statement = $pdo->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($data);
foreach($data as $row){
    echo "<tr><td>".$row['nim'].'</td>';
    echo "<td>".$row['nama'].'</td>';
    echo "<td>".$row['status']."</td>";
    echo "<td><a href='editdata.php?userid=".$row['userid']."'>Edit</a>
    <a href='hapusdata.php?userid=".$row['userid']."'>Hapus</a></td></tr>";
}
?>
</table>



<?php include("footer.php");?>

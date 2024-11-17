<?php
    include("DBConnection.php");
    include("header.php");
?>
    <h1>Tabel Data User</h1>

<?php
$sql = 'select * from user';
$statement = $pdo->query($sql);
$data = $statement->fetchALL(PDO::FETCH_ASSOC);
// var_dump($data);
?>
<table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Operasi</th>
    </tr>

<?php
foreach($data as $row) {
    echo "<tr><td>" .$row['nim']."</td>";
    echo "<td>" .$row['nama']."</td>";
    echo "<td>" .$row['status']."</td>";
    echo "<td><a href='editdata.php?userid=" . $row['userid'] . "'>Edit</a> 
        <span>||</span>
      <a href='hapusdata.php?userid=" . $row['userid'] . "'>Hapus</a></td></tr>";
}
?>
</table>
<?php
    include("footer.php");
?>
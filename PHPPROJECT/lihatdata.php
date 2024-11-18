<?php
    include("DBConnection.php");
    include("header.php");
?>

<h1>Tabel Data user</h1>

<?php 
$sql = 'select * from user';
$statemant = $pdo->query($sql);
$data = $statemant->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>

        </th>
    </tr>
    <?php
foreach($data as $row){
    echo "<tr><td>".$row['nim']."</td>";
    echo "<td>".$row['nama']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td><a href='editdata.php?userid=".$row["userid"]."'>Edit</a>
    <a href='hapusdata.php?userid=".$row["userid"]."'>Hapus</a></td></tr>";
}
?>
</table>




<?php include("footer.php")?>
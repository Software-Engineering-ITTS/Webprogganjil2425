<?php
include("DBConnection.php");
include("header.php");
?>
<h1>tabel Data User </h1>

<?php
// var_dump($pdo);
$sql = 'select * FROM mhs';
$statement =$pdo->query($sql);
$data = $statement ->fetchAll(PDO::FETCH_ASSOC);
// while ($data) {
    # code...
    // echo $data['nim'] |
?>

    <table>
        <tr>
            <th>nim</th>
            <th>nama</th>
            <th>status</th>
        </tr>

<?php
    foreach ($data as  $row) {
        # code... 
        echo "<tr><td>".$row['nim']."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td><a href='editData.php?id=".$row["id"]."'>edit</a>   
        <a href='hapusData.php?id=".$row["id"]."'>hapus</a></td></tr> "; 

        
    } 
?>
<!-- // } -->
</table>

<?php
include("footer.php");
?>
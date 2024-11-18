<?php
include("dataBase/Koneksi.php");
include('header.php');
?>

<h1>Tabel data Pelajar</h1>

<?php
$sql = 'select * from pelajar';
$statement = $pdo->query($sql);
$data = $statement -> fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table">
<tr>
    <th>nama</th>
    <th>nisn</th>
    <th>nilai</th>
    <th>kelas</th>
    <th>hari Favorit</th>
    <th>pengalaman</th>
    <th>Mapel</th>
    <th>asal</th>
</tr>

<?php
    foreach($data as $row){
        echo "<tr><td>". $row['nama']."</td>";
        echo "<td>".$row['nisn']."</td>";  
        echo "<td>".$row['nilai']."</td>";
        echo "<td>".$row['kelas']."</td>";
        echo "<td>".$row['hariFav']."</td>";
        echo "<td>".$row['pengalaman']."</td>";
        echo "<td>".$row['mapel']."</td>";
        echo "<td>".$row['asal']."</td>";
        echo "<td><a href='hapusData.php?id=".$row["id"]."'>hapus</a></td> </tr>";
    }
?>

</table>
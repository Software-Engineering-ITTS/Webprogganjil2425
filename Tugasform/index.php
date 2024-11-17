<?php
include("DBConnection.php");
include("header.php");
?>
<body style="background-color: antiquewhite; ">
    <h1 style="text-align: center;">Tabel Semua Data</h1>
</body>

<?php
$sql = 'select id, nim, nama, alamat, gender, prodi, tipe, alasan from perizinan';
$statement = $pdo->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<div style="display: flex; justify-content: center;">
    <table border= 1 style="text-align: center;">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Prodi</th>
            <th>Tipe</th>
            <th>Alasan</th>
        </tr>
    
    <?php
    foreach ($data as $row) {
        echo "<tr><td>".$row['nim']."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['alamat']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['prodi']."</td>";
        echo "<td>".$row['tipe']."</td>";
        echo "<td>".$row['alasan']."</td>";
        echo "<td><a href='hapusdata.php?id=" . $row["id"] . "'>Hapus</a></td></tr>";
        
    }
    ?>
    </table>
</div>
<?php
include("footer.php");
?>
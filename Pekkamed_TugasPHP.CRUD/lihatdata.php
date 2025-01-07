<?php
include("DBConnection.php");
include("header.php");
?>
<h1>Tabel Data Konsultasi</h1>

<?php
$sql = 'SELECT * FROM konsultasi';
$statement = $pdo->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tempat Kelahiran</th>
        <th>Gender</th>
        <th>Umur</th>
        <th>Keluhan</th>
        <th>Kondisi</th>
        <th>Konsultasi</th>

    </tr>
    <?php
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['tempat_kelahiran'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['umur'] . "</td>";
        echo "<td>" . $row['keluhan'] . "</td>";
        echo "<td>" . $row['kondisi'] . "</td>";
        echo "<td>" . $row['konsultasi'] . "</td>";
        echo "<td>
            <a href='editdata.php?id=" . $row["id"] . "'>Edit</a> | 
            <a href='hapusdata.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
          </td>";
        echo "</tr>";
    }
    ?>
</table>
<?php include("footer.php"); ?>
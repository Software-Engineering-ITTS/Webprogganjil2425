<html>
<?php
include('DbConnection.php');
include("header.php");
?>


<body data-bs-theme="dark" class="bg-black">
    <h1>Data Barang</h1>
    <a href="form.php">Tambah Barang</a>
    <?php
    // var_dump($pdo);
    $sql = 'select * from InventarisBarang';
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($data);
    ?>

    <!-- id	kode_barang	nama_barang	kategori_barang	tanggal_diterima	tanggal_expired	status_available	stock	gudang_penyimpanan	catatan -->
    <table>
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Tanggal Diterima</th>
            <th>Tanggal Expired</th>
            <th>Status</th>
            <th>Stock</th>
            <th>Gudang Penyimpanan</th>
            <th>Catatan</th>
        </tr>

        <?php
        foreach ($data as $row) {
            // echo "<tr><td>".$row['nim']." </td> ";
            // echo "<td>".$row['nama']." </td> ";
            // echo "<td> ".$row['status']."</td>";
            // echo "<td><a href='editdata.php?userid=".$row["userid"]."'>Edit</a></td>";
            // echo "<td><a href='hapusdata.php?userid=".$row["userid"]."'>Hapus</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>
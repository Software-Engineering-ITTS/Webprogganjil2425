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
            <th>Aksi</th>
        </tr>

        <?php
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kode_barang']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_barang']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kategori_barang']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_diterima']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_expired']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status_available']) . "</td>";
            echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
            echo "<td>" . htmlspecialchars($row['gudang_penyimpanan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['catatan']) . "</td>";
            echo "<td>";
            echo "<a href='form.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='hapusdata.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda Yakin Ingin Menghapus Barang Ini?');\">Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
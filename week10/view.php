<h3>Lihat Data</h3>
<table border="1">
    <tr>
        <td>NIM</td>
        <td>Nama</td>
        <td colspan="2">ACTION</td>
    </tr>
    <?php
    include "koneksi.php";
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr> <td>" . $data['nim'] . "</td><td>" . $data['nama'] . "</td>";
        echo "<td><a href='formupdate.php?nim=" . $data['nim'] . "'>
 Update</a></td>";
    }
    ?>
    echo "<td><a href='del.php?nim=".$data[' nim']."'>Del</a></td>
    </tr>";
</table> <br /><a href="formdaftar.php">Daftar</a>
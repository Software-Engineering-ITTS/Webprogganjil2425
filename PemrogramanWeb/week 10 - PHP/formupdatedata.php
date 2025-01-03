<?php
 include "koneksi.php";
 $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '".$_GET["nim"]."'");
 if ($data = mysqli_fetch_array($query)) {
 ?>
 <h3>Update Data</h3>
 <form method="post" action="update.php?nim=<?php echo $data['nim']; ?>">
 NIM: <?php echo $data['nim']; ?> <br />
 Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>" /> <br />
 <input type="submit" value="Update" />
 </form>
 <?php
 } else echo "Data tidak ditemukan";
 ?>
 <br /><a href='formdaftar.php'>Daftar</a>
 <br /><a href='view.php'>Lihat Data</a>

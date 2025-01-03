<?php
 include "koneksi.php";
 $query = mysqli_query($conn, "UPDATE mahasiswa SET nama = 
'".$_POST["nama"]."' WHERE nim = '".$_GET["nim"]."'");
 if ($query) echo "Data berhasil diubah";
 else echo "Data gagal diubah";
 echo "<br /><br /><a href='view.php'>Lihat Data</a>";
 ?>

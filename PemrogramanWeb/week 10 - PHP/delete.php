<?php
 include "koneksi.php";
 $query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = 
'".$_GET["nim"]."'");
 if ($query) echo "Data berhasil dihapus";
 else echo "Data gagal dihapus";
 echo "<br /><br /><a href='view.php'>Lihat Data</a>";
 ?>

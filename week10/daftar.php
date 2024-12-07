<?php
 include "koneksi.php";
 $query = mysqli_query($conn, "INSERT INTO mahasiswa(nim,nama) VALUES ('".$_POST["nim"]."','".$_POST["nama"]."')");
 if ($query) echo "Data berhasil diinput";
 else echo "Data gagal diinput";
 echo "<br /><br /><a href='view.php'>Lihat Data</a>";
?>
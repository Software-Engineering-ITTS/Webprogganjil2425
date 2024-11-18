<?php
    $conn = mysqli_connect("localhost", "root", "", "assesment2");

    function query($query){
      global $conn;
      // paramater ada 2 yaitu connection lalu query nya, lalu result adalah lemari nya
      $result = mysqli_query($conn, $query);
      // siapkan wadah kosong
      $rows = []; 
      // lalu ketika wadahnya diambil menggunakan looping
      while ($row = mysqli_fetch_assoc($result) ) { //baju yang diambil setiap looping nya
         $rows[] = $row; //menambahkan elemen baru di akhir setiap array
      }
      return $rows;
    }

    function tambah($data) {
        global $conn;
    
        $nama = htmlspecialchars($data["nama"]);
        $gender = htmlspecialchars($data["gender"]);
        $kejadian = htmlspecialchars($data["kejadian"]);
        $area = htmlspecialchars($data["area"]);
        $jenis_laporan = htmlspecialchars($data["jenis_laporan"]);
       
        $keywords = ["pencurian", "perkelahian", "balapan"];
        $status = "Aman"; 
        foreach ($keywords as $keyword) {
        if (strpos(strtolower($kejadian), $keyword) !== false) {
            $status = "Bahaya";
            break;
        }
    }
    
        $query = "INSERT INTO assesment2 (nama, gender, kejadian, area, status, jam, jenis_laporan)
                  VALUES ('$nama', '$gender', '$kejadian', '$area', '$status', NOW(), '$jenis_laporan')";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }
    
?>

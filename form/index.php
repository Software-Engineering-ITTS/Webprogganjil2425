<?php
include 'koneksi.php';


    // Mengambil data dari form
    $namaproyek =  $_POST["namaproyek"] ;
    $katasandi =  $_POST["katasandi"] ;
    $status =  $_POST["status"] ;
    $fitur = isset($_POST["fitur"]) ? (is_array($_POST["fitur"]) ? implode(", ", $_POST["fitur"]) : $_POST["fitur"]) : "";
    $deskripsi =  $_POST["deskripsi"] ;
    $prioritas =  $_POST["prioritas"] ;
    $tanggalmulaii =  $_POST["tanggalmulaii"] ;
    $tanggalselesai = $_POST["tanggalakhir"] ;
    
    // var_dump($_POST);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO proyek (namaproyek, katasandi, status, fitur, deskripsi, prioritas, tanggalmulaii, tanggalselesai ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("sql eror: ". mysqli_error($conn));
    }
        
    mysqli_stmt_bind_param($stmt,"ssssssss" ,
    $namaproyek, $katasandi, $status, $fitur, $deskripsi, $prioritas, $tanggalmulaii, $tanggalselesai);


if (mysqli_stmt_execute($stmt)){
    echo "data berhasil";

}else{
    echo "data gagal simpan". mysqli_error($conn);
}

$conn->close();
?>

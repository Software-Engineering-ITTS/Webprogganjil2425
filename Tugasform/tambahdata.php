<?php
include("header.php");
?>
    <body style="background-color: antiquewhite;">
    <form id="form" style="align-items: center; text-align: center;"
        action="simpandata.php"
        method="POST">

        <h1>Sistem Perizinan Mahasiswa</h1>
        <p>Input NIM</p>
        <input id="inputNIM" name="txt_nim" type="text">
        <p>Input Nama</p>
        <input id="inputNama" name="txt_nama" type="text">
        <p>Input Password</p>
        <input type="password" name="txt_password">
        <p id="alasan" >Alasan</p>
        <textarea id="inputAlasan" name="txt_alasan"></textarea>
        <p id="alamat">Alamat</p>
        <textarea id="inputAlamat" name="txt_alamat"></textarea>
    
    
    <div style="align-items: center; text-align: center;">
        <p>Tipe</p>
        <input type="checkbox" name="izin" id="izin" onchange="chkChange('izin')"> <span>Izin</span>
        <input type="checkbox" name="sakit" id="sakit" onchange="chkChange('sakit')"> <span>Sakit</span>
        <input type="checkbox" name="dispen" id="dispen" onchange="chkChange('dispen')"> <span>Dispen</span>
    </div>
     

    <div style="align-items: center; text-align: center;">
        <p>Gender</p>
        <input type="radio" name="gender" value="Laki-Laki">Laki-Laki</input>
        <input type="radio" name="gender" value="Perempuan">Perempuan</input>
    </div>
     
     
    <div style="padding-top: 20px; align-items: center; text-align: center;">
        <select name="prodi" id="">
            <option value="">Prodi</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
        </select>
    </div>
     
     
    <div style="padding-top: 20px; align-items: center; text-align: center;">
        <button id="btn" type="submit">Submit</button>
        <input id="btn2" type="reset" value="Reset"></input>
    </div>
</form>

    <script src="js.js"></script>
</body>


<?php
include("footer.php");
?>
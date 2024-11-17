<?php include("header.php"); ?>
<link rel="stylesheet" href="style.css">

<div>

    <div class="container my-5">
        <div class="row justify-content-center">

            <div class="custom-card">
                <img src="ft.doctor-team.png" alt="tim-dokter" class="icon-kiri">
                <h1 class="welcome">Welcome To PekkaMed</h1>
                <br> <br> <br> <br> <br> <br> <br> <br> <br>
                <h2 class="title-2">Formulir Pendataan Konsultasi Online</h2>
                <br>
                <br>
                <br>
                <br>

                <form id="form-user" name="form-user" action="simpandata.php" method="POST">
                    <label for="nama" class="nm">Nama </label>
                    <input type="text" name="txt_nama" id="nama" class="nama" required />
                    <br><br>

                    <label for="alamat" class="almt">Alamat </label>
                    <textarea name="txt_alamat" id="alamat" rows="4" class="txt-almt" required></textarea>
                    <br><br>

                    <label for="tempat_kelahiran" class="t-ttl">Tempat Kelahiran </label>
                    <input type="text" name="txt_tempat_kelahiran" id="tempat_kelahiran" class="ttl" required />
                    <br><br>

                    <label for="gender" class="t-gender">Gender </label>
                    <select name="txt_gender" id="gender" required>
                        <option value="Laki-Laki" class="genderr">Laki-Laki</option>
                        <option value="Perempuan" class="genderr">Perempuan</option>
                    </select>
                    <br><br>

                    <label for="umur" class="t-umur">Rentang Usia </label>
                    <select name="txt_umur" id="umur" class="umur">
                        <option value="1-5 Tahun">1-5 Tahun</option>
                        <option value="6-10 Tahun">6-10 Tahun</option>
                        <option value="11-15 Tahun">11-15 Tahun</option>
                        <option value="16-20 Tahun">16-20 Tahun</option>
                        <option value="21-25 Tahun">21-25 Tahun</option>
                        <option value="26-30 Tahun">26-30 Tahun</option>
                        <option value="31-35 Tahun">31-35 Tahun</option>
                        <option value="36-40 Tahun">36-40 Tahun</option>
                        <option value="41-45 Tahun">41-45 Tahun</option>
                        <option value="46-50 Tahun">46-50 Tahun</option>
                        <option value="51-55 Tahun">51-55 Tahun</option>
                        <option value="56-60 Tahun">56-60 Tahun</option>
                        <option value="60++ Tahun">60++ Tahun</option>
                    </select>
                    <br><br>

                    <label for="keluhan" class="t-keluhan">Keluhan </label>
                    <textarea name="txt_keluhan" id="keluhan" rows="5" class="keluhan" required></textarea>
                    <br><br>

                    <label for="kondisi" class="t-sikon">Kondisi Saat Ini </label>
                    <input type="text" name="txt_kondisi" id="kondisi" class="situasi" required />
                    <br><br>

                    <label for="konsultasi" class="t-konsul">Butuh Konsultasi Langsung?</label>
                    <select name="txt_konsultasi" id="konsultasi" required>
                        <option value="Ya" class="pilihan-konsul">Ya</option>
                        <option value="Tidak" class="pilihan-konsul">Tidak</option>
                    </select>
                    <br><br><br><br>

                    <input type="submit" value="Simpan" />
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
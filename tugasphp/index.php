<?php include("header.php"); ?>
<h1>Form User</h1>
<div>
    <form id="form-user" name="form-user" action="simpandata.php" method="POST">
        <div class="container bg-secondary-subtle">
            <h><b style="font-size: 50px;">Data Kesehatan Karyawan</b></h><br>
            <textarea style="width: 1000px">Form ini merupakan form untuk mendata semua data karyawan agar perusaahan mendapatkan data dari form ini yang dapat di gunakan jikalau ada suatu kejadian yang membutuhkan semua data ini</textarea>

            <label>ID karyawan</label>
            <input type="text" name="idkaryawan" />
            <br />
            <label>password karyawan</label>
            <input type="password" name="password" /><br />
            <input type="submit" name="submit" value="submit"></input>
        </div>
        <br>
        <div class="container bg-secondary-subtle">
            <h><b style="font-size: 50px;">Pendataan</b></h><br>

            <label>Nama Lengkap</label>
            <input type="text" name="nama"/>

            <label>Jenis Kelamin</label>
            <label><input type="radio" name="kelamin" value="pria">pria</label>
            <label><input type="radio" name="kelamin" value="wanita">wanita</label>

            <label>Alamat Rumah</label>
            <input type="text" name="alamat" />

            <label>Karyawan</label>
            <select name="karyawan">
                <option name="karyawan" value="karyawan tetap">Karyawan Tetap</option>
                <option name="karyawan" value="karyawan kontrak">Karyawan Kontrak</option>
            </select>

            <label name="penyait">pilih penyakit akut</label>
            <input type="checkbox" name="penyakit" value="ASMA">ASMA</input>
            <input type="checkbox" name="penyakit" value="Darah Tinggi">Darah Tinggi</input>
            <input type="checkbox" name="penyakit" value="Darah Rendah">Darah Rendah</input>

            <br>
            <h>Hasil Lab Test</h>
            <label name="gol">Golongan Darah</label>
            <select name="gol">
                <option name="gol" value="A">A</option>
                <option name="gol" value="B">B</option>
                <option name="gol" value="AB">AB</option>
                <option name="gol" value="O">O</option>
            </select>

            <label>Berat Badan</label>
            <input type="text" name="BB" />

            <label>Tinggi Badan</label>
            <input type="text" name="TB" />

            <br>
            <input type="submit" value="kirim">
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php include("footer.php"); ?>
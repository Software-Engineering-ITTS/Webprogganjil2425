<?php include("header.php");?>
<form id="form-user" name="form-user" action="simpandata.php" method="POST">
<div class="container" style="background-color: aqua;">
        <h1 class="judul" style="text-align: center; background-color: red;">Formulir Laporan Keuangan</h1>
        <p style="text-align: center;">Toko Madura</p>
        <div class="isi" style="">
        <br>
        <br>
        <b>username:</b>
        <input type="text" name="username">
        <br>
        <br>
        <b>password :</b>
        <input type="password" class="password" name="password">
        <br>
        <br>
        <input type="radio" class="radio" name="jabatan" value="Owner">
        <b>Owner</b>
    </input>
        <input type="radio" class="radio" name="jabatan" value="Pegawai">
        <b>Pegawai</b>
    </input>
    <br>
   <br>
   <br>
   <textarea placeholder="Keterangan" name="keterangan"></textarea>
   <br>
   <br>
   <label for="vehicle1" name="barang">Jenis Barang</label><br>
   <input type="checkbox" id="food & Drink" name="barang" value="Food & Drink">Makanan & minuman</input>
<input type="checkbox" id="vehicle2" name="barang" value="Sembako">Sembako</input>
<input type="checkbox" id="vehicle3" name="barang" value="Perlengkapan">Perlengkapan</input>
<br>
<br>
    <div class="dropdown" name="transaksi">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" name="transaksi">
          Pilih
          <ul class="dropdown-menu" name="transaksi">
            <li><input class="dropdown-item" name="transaksi" value="Expense"></input></li>
            <li><input class="dropdown-item" name="transaksi" value="income"></input></li>
          </ul>
        </button>
      </div>
      <br>
      <br>
        <!-- <button>submit</button> -->
   <input type="submit">
    </div>
</div>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        </form>    
    <?php
    include("footer.php");
    ?>

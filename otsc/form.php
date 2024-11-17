<!DOCTYPE html>
<html lang="en">

<?php
include("header.php");
?>

<body data-bs-theme="dark" class="bg-black">
    <div class="container-fluid p-5">
        <h1>FORM Inventaris Barang PT ABC</h1>
        <a href="index.php">Lihat Data Barang</a>
        <form 
        method="post" 
        action="simpandata.php">
            <input type="text" name="txtIdBarang" hidden="true" id="id_barang">
            <div class="form-group my-4 px-5">
                <label for="txtKodeBarang">Kode Barang</label>
                <input type="text" id="txtKodeBarang" class="form-control" name="txtKodeBarang"
                    placeholder="masukkan kode barang">
            </div>

            <div class="form-group my-4 px-5">
                <label for="txtNamaBarang">Nama Barang</label>
                <input type="text" name="txtNamaBarang" id="txtNamaBarang" class="form-control"
                    placeholder="masukkan nama barang">
            </div>

            <div class="form-group my-4 px-5">
                <label for="selectCategory">Kategori Barang</label>
                <select name="category" id="selectCategory" class="form-control" >
                    <option value="stationery">Stationery</option>
                    <option value="clothing">Clothing</option>
                    <option value="f&b">Food And Beverages</option>
                    <option value="furniture">Furniture</option>
                    <option value="electronics">Electronics</option>
                </select>
            </div>

            <div class="form-group my-4 px-5">
                <label for="inpDateDiterima">Tanggal Diterima</label>
                <input type="date" name="" id="inpDateDiterima">
            </div>

            <div class="form-group my-4 px-5" id="tanggalExpiredForm" hidden="true">
                <label for="inpDateExp">Tanggal Expired</label>
                <input type="date" name="" id="inpDateExp">
            </div>

            <div class="form-group my-4 px-5">
                <label for="inpAvailability">Ketersediaan Barang</label>
                <div class="form-check">
                    <input type="radio" name="availability" id="inpAvailability" value="available"
                        class="form-check-input">In Stock
                    <br>
                    <input type="radio" name="availability" id="inpInAvailability" value="unavailable"
                        class="form-check-input">Out Of Stock
                </div>

                <div class="form-group " id="inpNewStock" hidden="true">
                    <p>Stock Barang (Akumulasi)</p>
                    <input type="number" class="form-control" name="stockBarang" id="inpStockBarang">
                </div>
            </div>

            <div class="form-group my-4 px-5">
                <label for="gudang">Gudang Penyimpanan</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="gudang[]" id="gudangA" value="Gudang A">Gudang A
                    <br>
                    <input type="checkbox" name="gudang[]" class="form-check-input" id="gudangB" value="Gudang B">Gudang B
                    <br>
                    <input type="checkbox" name="gudang[]" class="form-check-input" id="gudangC" value="Gudang C">Gudang C
                </div>
            </div>

            <div class="form-group my-4 px-5">
                <label for="catatan-tambahan">Catatan Tambahan</label>
                <textarea name="" id="catatan-tambahan" class="form-control" placeholder="catatan tambahan"></textarea>
            </div>

            <div class="form-group my-4 px-5">
                <label for="inpVerifikasiPegawai">No Verifikasi Pegawai</label>
                <input type="password" name="inpVerifikasiPegawai" class="form-control" id="inpVerifikasiPegawai"
                    placeholder="Masukkan Nomor Verifikasi Pegawai">
                <input type="checkbox" name="toglePass" class="form-check-input" id="chkTogglePass">Tampilkan
            </div>

            <br>

            <div class="d-flex gap-3 justify-content-end mx-5">
                <input class="btn btn-outline-danger my-4 px-5" id="btnClear" type="clear" value="clear">
                <input id="btnSubmit" class="btn btn-primary my-4 px-5" type="submit" value="submit">
            </div>


        </form>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>

</html>
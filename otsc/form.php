<!DOCTYPE html>
<html lang="en">

<?php
include("header.php");

include("DbConnection.php");
include("header.php");
$id = intval($_GET['id']);


$sql = "SELECT * FROM InventarisBarang WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$data = $statement->fetch(PDO::FETCH_ASSOC);

if ($data) {
    // Bind data to variables
    $kode_barang = $data['kode_barang'];
    $nama_barang = $data['nama_barang'];
    $kategori_barang = $data['kategori_barang'];
    $tanggal_diterima = $data['tanggal_diterima'];
    $tanggal_expired = $data['tanggal_expired'];
    $status_available = $data['status_available'];
    $stock = $data['stock'];
    $gudang_penyimpanan = $data['gudang_penyimpanan'];
    $catatan = $data['catatan'];
    $verification = $data['no_verifikasi_pegawai'];
}

?>

<body data-bs-theme="dark" class="bg-black">
    <div class="container-fluid p-5">
        <h1>FORM Inventaris Barang PT ABC</h1>
        <a href="index.php">Lihat Data Barang</a>
        <form
            method="post"
            action="simpandata.php">
            <input type="text" name="txtIdBarang" hidden="true" id="id_barang" value="<?= $$id ?>">
            <div class="form-group my-4 px-5">
                <label for="txtKodeBarang">Kode Barang</label>
                <input type="text" id="txtKodeBarang" class="form-control" name="txtKodeBarang"
                    placeholder="masukkan kode barang" value="<?= $kode_barang ?>">
            </div>

            <div class="form-group my-4 px-5">
                <label for="txtNamaBarang">Nama Barang</label>
                <input type="text" name="txtNamaBarang" id="txtNamaBarang" class="form-control"
                    placeholder="masukkan nama barang" value="<?= $nama_barang ?>">
            </div>

            <div class="form-group my-4 px-5">
                <label for="selectCategory">Kategori Barang</label>
                <select name="category" id="selectCategory" class="form-control">
                    <option value="" selected>Pilih Kategori</option>
                    <option value="stationery" <?= $kategori_barang === 'stationery' ? 'selected' : '' ?>>Stationery</option>
                    <option value="clothing"<?= $kategori_barang === 'clothing' ? 'selected' : '' ?>>Clothing</option>
                    <option value="f&b" <?= $kategori_barang === 'f&b' ? 'selected' : '' ?>>Food And Beverages</option>
                    <option value="furniture" <?= $kategori_barang === 'furniture' ? 'selected' : '' ?>>Furniture</option>
                    <option value="electronics" <?= $kategori_barang === 'electronics' ? 'selected' : '' ?>>Electronics</option>
                </select>
            </div>

            <div class="form-group my-4 px-5">
                <label for="inpDateDiterima">Tanggal Diterima</label>
                <input type="date" name="inpDateDiterima" id="inpDateDiterima" value="<?= htmlspecialchars($tanggal_diterima) ?>>
            </div>

            <div class="form-group my-4 px-5" id="tanggalExpiredForm" hidden="true">
                <label for="inpDateExp">Tanggal Expired</label>
                <input type="date" name="inpDateExp" id="inpDateExp" value="<?= htmlspecialchars($tanggal_expired) ?>>
            </div>

            <div class="form-group my-4 px-5">
                <label for="inpAvailability">Ketersediaan Barang</label>
                <div class="form-check">
                    <input type="radio" name="availability" id="inpAvailability" value="available"
                        class="form-check-input" <?= $status_available === 'available' ? 'checked' : '' ?>>In Stock
                    <br>
                    <input type="radio" name="availability" id="inpInAvailability" value="unavailable"
                        class="form-check-input" <?= $status_available === 'unavailable' ? 'checked' : '' ?>>Out Of Stock
                </div>

                <div class="form-group " id="inpNewStock" hidden="true">
                    <p>Stock Barang (Akumulasi)</p>
                    <input type="number" class="form-control" name="stockBarang" id="inpStockBarang" value="<?=$stock?>">
                </div>
            </div>

            <div class="form-group my-4 px-5">
                <label for="gudang">Gudang Penyimpanan</label>
                <div class="form-check">
                    <?php
                    $gudang_array = explode(';', $gudang_penyimpanan);
                    ?>
                    <input type="checkbox" class="form-check-input" name="gudang[]" id="gudangA" value="Gudang A"  <?= in_array('Gudang A', $gudang_array) ? 'checked' : '' ?>>Gudang A
                    <br>
                    <input type="checkbox" name="gudang[]" class="form-check-input" id="gudangB" value="Gudang B"  <?= in_array('Gudang B', $gudang_array) ? 'checked' : '' ?>>Gudang B
                    <br>
                    <input type="checkbox" name="gudang[]" class="form-check-input" id="gudangC" value="Gudang C" <?= in_array('Gudang C', $gudang_array) ? 'checked' : '' ?>>Gudang C
                </div>
            </div>

            <div class="form-group my-4 px-5">
                <label for="catatan-tambahan">Catatan Tambahan</label>
                <textarea name="" id="catatan-tambahan" class="form-control" placeholder="catatan tambahan"><?= htmlspecialchars($catatan) ?></textarea>
            </div>

            <div class="form-group my-4 px-5">
                <label for="inpVerifikasiPegawai">No Verifikasi Pegawai</label>
                <input type="password" name="inpVerifikasiPegawai" class="form-control" id="inpVerifikasiPegawai" value="<?= $verification ?>"
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
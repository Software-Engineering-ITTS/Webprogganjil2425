import { useState } from "react";
import "./index.css";

function App() {
  const [form, setForm] = useState({
    namaLengkap: "",
    alamatProduk: "",
    tanggalPenjualan: "",
    metodePembayaran: "",
    password: "",
    konfirmasiPassword: "",
    namaProduk: "",
    kodeProduk: "",
    jumlah: "",
    harga: "",
    pilihanSales: "",
    pilihanPelanggan: [],
    catatan: "",
  });

  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    if (type === "checkbox") {
      setForm({
        ...form,
        pilihanPelanggan: checked
          ? [...form.pilihanPelanggan, value]
          : form.pilihanPelanggan.filter((item) => item !== value),
      });
    } else {
      setForm({
        ...form,
        [name]: value,
      });
    }
  };

  const onSubmit = (e) => {
    e.preventDefault();
    const validationErrors = validateForm(form);
    setErrors(validationErrors);
    if (Object.keys(validationErrors).length === 0) {
      console.log("Data submitted:", form);
    }
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.namaLengkap.trim())
      errors.namaLengkap = "Nama lengkap wajib diisi";
    if (!form.alamatProduk.trim())
      errors.alamatProduk = "Alamat produk wajib diisi";
    if (!form.tanggalPenjualan)
      errors.tanggalPenjualan = "Tanggal penjualan wajib diisi";
    if (!form.metodePembayaran)
      errors.metodePembayaran = "Metode pembayaran wajib dipilih";
    if (!form.password) errors.password = "Password wajib diisi";
    else if (form.password.length < 8) errors.password = "Minimal 8 karakter";
    if (form.password !== form.konfirmasiPassword)
      errors.konfirmasiPassword = "Password tidak sesuai";
    if (!form.namaProduk.trim()) errors.namaProduk = "Nama produk wajib diisi";
    if (!form.kodeProduk.trim()) errors.kodeProduk = "Kode produk wajib diisi";
    if (!form.jumlah) errors.jumlah = "Jumlah wajib diisi";
    if (!form.harga) errors.harga = "Harga wajib diisi";
    return errors;
  };

  return (
    <div className="container">
      <form onSubmit={onSubmit}>
        <h2 className="title">Sistem Penjualan Langsung</h2>

        <div className="user-details">
          <div className="input-box">
            <label className="details">Nama Lengkap:</label>
            <input type="text" name="namaLengkap" onChange={handleChange} />
            {errors.namaLengkap && (
              <span className="error-message">{errors.namaLengkap}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Alamat Produk:</label>
            <input type="text" name="alamatProduk" onChange={handleChange} />
            {errors.alamatProduk && (
              <span className="error-message" style={{color: "red"}}>{errors.alamatProduk}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Tanggal Penjualan:</label>
            <input
              type="date"
              name="tanggalPenjualan"
              onChange={handleChange}
            />
            {errors.tanggalPenjualan && (
              <span className="error-message">{errors.tanggalPenjualan}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Metode Pembayaran:</label>
            <select name="metodePembayaran" onChange={handleChange}>
              <option value="">Pilih metode pembayaran</option>
              <option value="tunai">Tunai</option>
              <option value="transfer">Transfer Bank</option>
              <option value="kartu-kredit">Kartu Kredit</option>
            </select>
            {errors.metodePembayaran && (
              <span className="error-message">{errors.metodePembayaran}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Password:</label>
            <input type="password" name="password" onChange={handleChange} />
            {errors.password && (
              <span className="error-message">{errors.password}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Konfirmasi Password:</label>
            <input
              type="password"
              name="konfirmasiPassword"
              onChange={handleChange}
            />
            {errors.konfirmasiPassword && (
              <span className="error-message">{errors.konfirmasiPassword}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Nama Produk:</label>
            <input type="text" name="namaProduk" onChange={handleChange} />
            {errors.namaProduk && (
              <span className="error-message">{errors.namaProduk}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Kode Produk:</label>
            <input type="number" name="kodeProduk" onChange={handleChange} />
            {errors.kodeProduk && (
              <span className="error-message">{errors.kodeProduk}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Jumlah:</label>
            <input type="number" name="jumlah" onChange={handleChange} />
            {errors.jumlah && (
              <span className="error-message">{errors.jumlah}</span>
            )}
          </div>

          <div className="input-box">
            <label className="details">Harga Satuan:</label>
            <input type="number" name="harga" onChange={handleChange} />
            {errors.harga && (
              <span className="error-message">{errors.harga}</span>
            )}
          </div>

          <div className="checkbox">
            <label>Pilihan Pelanggan:</label>
            <label>
              <input
                type="checkbox"
                name="pilihanPelanggan"
                value="Setuju"
                onChange={handleChange}
              />{" "}
              Setuju
            </label>
            <label>
              <input
                type="checkbox"
                name="pilihanPelanggan"
                value="Tidak Setuju"
                onChange={handleChange}
              />{" "}
              Tidak Setuju
            </label>
            <label>
              <input
                type="checkbox"
                name="pilihanPelanggan"
                value="Terserah Lah"
                onChange={handleChange}
              />{" "}
              Terserah Lah
            </label>
          </div>

          <div className="input-box">
            <label>Catatan:</label>
            <textarea
              name="catatan"
              rows="4"
              cols="50"
              onChange={handleChange}
              placeholder="Masukkan pesan anda..."
            ></textarea>
          </div>
        </div>

        <div className="button">
          <input type="submit" value="Daftarkan" />
        </div>
      </form>
    </div>
  );
}

export default App;

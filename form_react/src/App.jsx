import "bootstrap/dist/css/bootstrap.css";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";
import { useState } from "react";

function App() {
  const [errors, setErrors] = useState({});

  const validateForm = (e) => {
    e.preventDefault();
    const formErrors = {};

    const nama = document.getElementById("nama").value;

    const nip = document.getElementById("nip").value;

    const genderlk = document.getElementById("lk").checked;
    const genderpr = document.getElementById("pr").checked;

    const alamat = document.getElementById("alamat").value;

    const divisi = document.getElementById("divisi").value;

    const shift1 = document.getElementById("pagi").checked;
    const shift2 = document.getElementById("malam").checked;

    const alasan = document.getElementById("alasan").value;

    const file = document.getElementById("file").files[0];
    
    const password = document.getElementById("pw").value;

    const hr1 = document.getElementById("hr1").checked;
    const hr2 = document.getElementById("hr2").checked;
    const hr3 = document.getElementById("hr3").checked;
    const hr4 = document.getElementById("hr4").checked;
    const hr5 = document.getElementById("hr5").checked;
    const hr6 = document.getElementById("hr6").checked;

    if (!nama.trim()) {
      formErrors.nama = "Nama karyawan harus diisi";
    }

    if (!nip.trim()) {
      formErrors.nip = "NIP harus diisi";
    }

    if (!genderlk & !genderpr) {
      formErrors.gender = "Jenis kelamin harus dipilih";
    } 

    if (!alamat.trim()) {
      formErrors.alamat = "Alamat harus diisi";
    } 

    if (!divisi) {
      formErrors.divisi = "Divisi harus dipilih";
    } 

    if (!hr1 && !hr2 && !hr3 && !hr4 && !hr5 && !hr6) {
      formErrors.hari = "Pilih minimal satu hari";
    }

    if (!shift1 && !shift2) {
      formErrors.shift = "Shift harus dipilih";
    } 

    if (!alasan.trim()) {
      formErrors.alasan = "Alasan harus diisi";
    } 

    if (!file) {
      formErrors.file = "Surat persetujuan harus diunggah";
    } 

    if (!password.trim()) {
      formErrors.password = "Password harus diisi";
    } 

    setErrors(formErrors);

    if (Object.keys(formErrors).length === 0) {
      alert("Form berhasil disubmit!");
    }
  };

  return (
    <body>
      <main className="container">
        <p id="title" className="mb-5 mt-5 text-center">
          Form Rotasi Karyawan
        </p>
        <div>
          <form onSubmit={validateForm}>
            <div className="mb-4">
              <p className="text">Nama Karyawan</p>
              <input className="form-control" id="nama" type="text" />
              <span className="text-danger">{errors.nama}</span>
            </div>

            <div className="mb-4">
              <p className="text">NIP</p>
              <input className="form-control" id="nip" type="number" />
              <span className="text-danger">{errors.nip}</span>
            </div>

            <div className="mb-4">
              <p className="text">Jenis Kelamin</p>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="radio"
                  name="gender"
                  id="lk"
                />
                <label className="form-check-label" htmlFor="lk">
                  Laki-Laki
                </label>
              </div>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="radio"
                  name="gender"
                  id="pr"
                />
                <label className="form-check-label" htmlFor="pr">
                  Perempuan
                </label>
              </div>
              <span className="text-danger">{errors.gender}</span>
            </div>

            <div className="mb-4">
              <p className="text">Alamat</p>
              <textarea className="form-control" id="alamat"></textarea>
              <span className="text-danger">{errors.alamat}</span>
            </div>

            <div className="mb-4">
              <p className="text">Divisi / Bagian</p>
              <select className="form-control" id="divisi">
                <option value="Produksi">Produksi</option>
                <option value="Pemasaran">Pemasaran & Penjualan</option>
                <option value="Cleaning">Cleaning Service</option>
              </select>
              <span className="text-danger">{errors.divisi}</span>
            </div>

            <div className="mb-4">
              <p className="text">Pilih Hari</p>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="hr1" />
                <label htmlFor="hr1">Senin</label>
              </div>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="hr2" />
                <label htmlFor="hr2">Selasa</label>
              </div>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="hr3" />
                <label htmlFor="hr3">Rabu</label>
              </div>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="hr4" />
                <label htmlFor="hr4">Kamis</label>
              </div>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="hr5" />
                <label htmlFor="hr5">Jumat</label>
              </div>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="hr6" />
                <label htmlFor="hr6">Sabtu</label>
              </div>
              <span className="text-danger">{errors.hari}</span>
            </div>

            <div className="mb-4">
              <p className="text">Pilih Shift</p>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="radio"
                  name="shift"
                  id="pagi"
                />
                <label className="form-check-label" htmlFor="pagi">
                  Pagi
                </label>
              </div>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="radio"
                  name="shift"
                  id="malam"
                />
                <label className="form-check-label" htmlFor="malam">
                  Malam
                </label>
              </div>
              <span className="text-danger">{errors.shift}</span>
            </div>

            <div className="mb-4">
              <p className="text">Alasan Mengajukan Rotasi Karyawan</p>
              <textarea className="form-control" id="alasan"></textarea>
              <span className="text-danger">{errors.alasan}</span>
            </div>

            <div className="mb-4">
              <p className="text">Surat Persetujuan Kepala Divisi</p>
              <input className="form-control" type="file" id="file" />
              <span className="text-danger">{errors.file}</span>
            </div>

            <div className="mb-4">
              <p className="text">Konfirmasi Password Karyawan</p>
              <input className="form-control" type="password" id="pw" />
              <span className="text-danger">{errors.password}</span>
            </div>

            <div className="row col-12 d-flex gap-4 mb-5 justify-content-center align-items-center">
              <button
                className="col-lg-2 col-md-3 col-4 btnsubmit"
                type="submit"
              >
                Konfirmasi
              </button>
              <button className="col-lg-2 col-md-3 col-4 btnreset" type="reset">
                Reset
              </button>
            </div>
          </form>
        </div>
      </main>

      <footer
        className="container-fluid d-flex justify-content-center align-items-center"
        style={{ height: "50px", backgroundColor: "black" }}
      >
        <p
          style={{
            color: "white",
            fontWeight: 200,
            fontSize: "15px",
            margin: 0,
          }}
        >
          © 2024 Made with 🩷 by ZIA
        </p>
      </footer>
    </body>
  );
}

export default App;
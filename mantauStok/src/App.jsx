import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'


function App() {
  const [form, setForm] = useState({ inputNama: "", inputHargaBeli: "", password: "", inputHargaJual: "", inputKeterangan: "", inputTipe: "", namaBrg: "" });
  const [errors, setError] = useState({})
  const [Selesai, setSelesai] = useState("")

  const handleChange = (e) => {
    const { name, value } = e.target
    setForm({
      ...form,
      [name]: value
    });
  }

  const chkChange = (e) => {
    const { id, checked } = e.target
    chkJelek.checked = id == "chkJelek" && checked
    chkStandar.checked = id == "chkStandar" && checked
    chkBagus.checked = id == "chkBagus" && checked
  }

  const onSubmit = (e) => {
    e.preventDefault();
    setSelesai("")
    const listErrors = validateForm(form)
    setError(listErrors);
    if (Object.keys(listErrors).length === 0) {
      console.log("Nama: " + inputNama.value)
      console.log("Gender: " + (rdL.checked ? "Laki Laki" : (rdP.checked ? "Perempuan" : "Hilang")))
      console.log("Nama Barang: " + namaBrg.value)
      console.log("Harga Beli: " + inputHargaBeli.value)
      console.log("Harga Jual: " + inputHargaJual.value)
      console.log("Kondisi: " + (chkJelek.checked ? "Jelek" : (chkStandar.checked ? "Standar" : (chkBagus.checked ? "Bagus" : "Hilang"))))
      console.log("Keterangan: " + inputKeterangan.value)
      setSelesai("Selesai")
    }
  }

  const validateForm = (form) => {
    const errors = {};
    if (!form.inputNama) {
      errors.inputNama = "nama is required"
    }
    if (!form.inputHargaBeli.trim()) {
      errors.inputHargaBeli = "beli is required"
    }
    if (!form.password) {
      errors.password = "password is required"
    }
    if (!form.inputHargaJual) {
      errors.inputHargaJual = "jual is required"
    }
    if (!form.inputKeterangan) {
      errors.inputKeterangan = "keterangan is required"
    }
    if (!(chkJelek.checked || chkStandar.checked || chkBagus.checked)) {
      errors.chkTipe = "kondisi is required"
    }
    if (!(rdL.checked || rdP.checked)) {
      errors.Gender = "gender is required"
    }
    if (!form.namaBrg) {
      errors.namaBrg = "namaBrg is required"
    }
    return errors;
  }

  return (
    <form onSubmit={onSubmit} id="form" style={{ alignItems: 'center', textAlign: 'center'}}>
      <h1>Sistem Pemantauan Barang</h1>
      <p>Input Nama Pegawai</p>
      <input id="inputNama" name='inputNama' type="text" onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputNama}</p>

      <p>Input Password Pegawai</p>
      <input id='password' name='password' type="password" onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.password}</p>

      <div style={{ alignItems: 'center', textAlign: 'center' }}>
        <p>Gender</p>
        <div>
          <input id='rdL' type="radio" name="gender" />
          Laki-Laki
        </div>
        <div>
          <input id='rdP' type="radio" name="gender" />
          Perempuan
        </div>
        <p style={{ color: 'red' }}>{errors.Gender}</p>
      </div>

      <div style={{ alignItems: 'center', textAlign: 'center', paddingTop: '20px' }}>
        <select id="namaBrg" name='namaBrg' onChange={handleChange}>
          <option value="">Nama Barang</option>
          <option value="Paku">Paku</option>
          <option value="Palu">Palu</option>
          <option value="Semen">Semen</option>
          <option value="Kayu">Kayu</option>
          <option value="Bata">Bata</option>
          <option value="Pasir">Pasir</option>
          <option value="Koral">Kolar</option>
        </select>
        <p style={{ color: 'red' }}>{errors.namaBrg}</p>
      </div>

      <p>Harga Beli Barang</p>
      <input id="inputHargaBeli" name='inputHargaBeli' type="text" onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputHargaBeli}</p>

      <p>Harga Jual Barang</p>
      <input id="inputHargaJual" name='inputHargaJual' onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputHargaJual}</p>

      <div style={{ alignItems: 'center', textAlign: 'center' }}>
        <p>Kondisi Barang</p>
        <div>
          <input id='chkJelek' type="checkbox" onChange={chkChange} />
          <span>Jelek</span>

          <input id='chkStandar' type="checkbox" onChange={chkChange} />
          <span>Standar</span>

          <input id='chkBagus' type="checkbox" onChange={chkChange} />
          <span>Bagus</span>
        </div>
        <p style={{ color: 'red' }}>{errors.chkTipe}</p>
      </div>

      <p id="alamat">Keterangan Barang</p>
      <textarea id="inputKeterangan" name='inputKeterangan' onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputKeterangan}</p>    

      <div style={{ alignItems: 'center', textAlign: 'center', paddingTop: '20px' }}>
        <button id="btn" type="submit">Submit</button>
        <p id='Selesai' style={{ color: 'green' }}>{Selesai}</p>
        <div style={{ paddingTop: '10px' }}>
          <input id="btn2" type="reset" value="Reset" />
        </div>
      </div>
    </form>
  )
}

export default App;

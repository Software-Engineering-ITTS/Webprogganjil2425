import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'


function App() {
  const [form, setForm] = useState({ inputNama: "", inputNIM: "", password: "", inputAlasan: "", inputAlamat: "", inputTipe: "", prodi: "" });
  const [errors, setError] = useState({})
  const [sukses, setSukses] = useState("")

  const handleChange = (e) => {
    const { name, value } = e.target
    setForm({
      ...form,
      [name]: value
    });
  }

  const chkChange = (e) => {
    const { id, checked } = e.target
    chkIzin.checked = id == "chkIzin" && checked
    chkSakit.checked = id == "chkSakit" && checked
    chkDispen.checked = id == "chkDispen" && checked
  }

  const onSubmit = (e) => {
    e.preventDefault();
    setSukses("")
    const listErrors = validateForm(form)
    setError(listErrors);
    if (Object.keys(listErrors).length === 0) {
      console.log("NIM: " + inputNIM.value)
      console.log("Nama: " + inputNama.value)
      console.log("Alasan: " + inputAlasan.value)
      console.log("Alamat: " + inputAlamat.value)
      console.log("Tipe: " + (chkIzin.checked ? "Izin" : (chkSakit.checked ? "Sakit" : (chkDispen.checked ? "Dispen" : "Ilang"))))
      console.log("Gender: " + (rdL.checked ? "Laki Laki" : (rdP.checked ? "Perempuan" : "Ilang")))
      console.log("Prodi: " + prodi.value)
      setSukses("sukses")
    }
  }

  const validateForm = (form) => {
    const errors = {};
    if (!form.inputNIM) {
      errors.inputNIM = "NIM is required"
    }
    if (!form.inputNama.trim()) {
      errors.inputNama = "nama is required"
    }
    if (!form.password) {
      errors.password = "password is required"
    }
    if (!form.inputAlasan) {
      errors.inputAlasan = "alasan is required"
    }
    if (!form.inputAlamat) {
      errors.inputAlamat = "alamat is required"
    }
    if (!(chkIzin.checked || chkSakit.checked || chkDispen.checked)) {
      errors.chkTipe = "tipe is required"
    }
    if (!(rdL.checked || rdP.checked)) {
      errors.Gender = "gender is required"
    }
    if (!form.prodi) {
      errors.prodi = "prodi is required"
    }
    return errors;
  }

  return (
    <form onSubmit={onSubmit} id="form" style={{ alignItems: 'center', textAlign: 'center' }}>
      <h1>Sistem Perizinan Mahasiswa</h1>
      <p>Input NIM</p>
      <input id="inputNIM" name='inputNIM' type="text" onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputNIM}</p>

      <p>Input Nama</p>
      <input id="inputNama" name='inputNama' type="text" onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputNama}</p>

      <p>Input Password</p>
      <input id='password' name='password' type="password" onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.password}</p>

      <p id="alasan">Alasan</p>
      <textarea id="inputAlasan" name='inputAlasan' onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputAlasan}</p>

      <p id="alamat">Alamat</p>
      <textarea id="inputAlamat" name='inputAlamat' onChange={handleChange} />
      <p style={{ color: 'red' }}>{errors.inputAlamat}</p>

      <div style={{ alignItems: 'center', textAlign: 'center' }}>
        <p>Tipe</p>
        <div>
          <input id='chkIzin' type="checkbox" onChange={chkChange} />
          <span>Izin</span>

          <input id='chkSakit' type="checkbox" onChange={chkChange} />
          <span>Sakit</span>

          <input id='chkDispen' type="checkbox" onChange={chkChange} />
          <span>Dispen</span>
        </div>
        <p style={{ color: 'red' }}>{errors.chkTipe}</p>
      </div>

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
        <select id="prodi" name='prodi' onChange={handleChange}>
          <option value="">Prodi</option>
          <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          <option value="Teknologi Informasi">Teknologi Informasi</option>
          <option value="Teknik Elektro">Teknik Elektro</option>
          <option value="Sistem Informasi">Sistem Informasi</option>
        </select>
        <p style={{ color: 'red' }}>{errors.prodi}</p>
      </div>

      <div style={{ alignItems: 'center', textAlign: 'center', paddingTop: '20px' }}>
        <button id="btn" type="submit">Submit</button>
        <p id='sukses' style={{ color: 'green' }}>{sukses}</p>
        <div style={{ paddingTop: '10px' }}>
          <input id="btn2" type="reset" value="Reset" />
        </div>
      </div>
    </form>
  )
}

export default App;

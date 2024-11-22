// eslint-disable-next-line no-unused-vars
import React from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
import './App.css'


function App() {
  const handleSubmit = (event) => {
    event.preventDefault();
    if (window.confirm("Simpan data?")) {
      alert("Data disimpan");
    } else {
      alert("You pressed Cancel!");
    }
  };

  return (
    <div className="container">
      <h1>Form Pengaduan Akun</h1>
      <form onSubmit={handleSubmit} id="myForm">
        <label>Nama Lengkap</label> <br />
        <input className="ak3" type="text" placeholder="  masukkan nama lengkap" /> <br /><br />

        <label>Nickname</label> <br />
        <input className="ak3" type="text" placeholder="  masukkan nickname" /> <br /><br />

        <label>Email</label> <br />
        <input className="ak3" type="email" placeholder="  masukkan email" /> <br /><br />

        <label>Password</label> <br />
        <input className="ak3" type="password" placeholder="  masukkan password" /> <br /><br />

        <label>No Telpon</label> <br />
        <input className="ak3" type="tel" placeholder="  masukkan notlp" /> <br /><br />

        <input type="radio" id="pria" name="gender" value="Pria" />
        <label htmlFor="pria">Pria</label>
        <input type="radio" id="wanita" name="gender" value="Wanita" />
        <label htmlFor="wanita">Wanita</label> <br /><br />

        <label htmlFor="masalah">Masalah dihadapi</label><br />
        <select name="tipe_keluhan">
          <option value="akun error">akun error</option>
          <option value="akun tidak bisa login">akun tidak bisa login</option>
          <option value="akun kena ban">akun kena ban</option>
        </select> <br /><br />

        <label>Jelaskan Masalah</label> <br />
        <textarea name="Alamat" placeholder="  tulis masalah"></textarea> <br /><br />

        <label htmlFor="cek">Setuju</label>
        <input type="checkbox" id="cek" /> <br /><br />

        <input className="button" type="submit" value="Submit" />
      </form>
    </div>
  );
}

export default App;

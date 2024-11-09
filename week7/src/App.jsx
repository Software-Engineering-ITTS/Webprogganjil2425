import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

function App() {

  return (
   <>
  <div className="container">
      <div className="py-5 text-center">
        <h1>Sistem Keanggotaan</h1>
      </div>

      {/* <!-- avatar --> */}
      <div className="container-fluid row">
        <div className="col d-flex justify-content-center align-items-center">
          <img
            style="width: 100%; max-width: 450px"
            src="https://www.w3schools.com/howto/img_avatar.png"
            className="img-thumbnail rounded-circle"
            alt=""
          />
        </div>
        {/* <!-- avatar --> */}

        <div className="col py-4">
          <form action="">
            <div className="mb-3">
              <label>Nama : </label>
              <input type="text" />
            </div>

            <div className="mb-3">
              <label>Tanggal Lahir :</label>
              <input type="date" />
            </div>

            <div className="mb-3">
              <label>Gender : </label> <br />
              <input type="radio" name="gender" value="Laki-Laki" />
              <label>Laki - Laki</label> <br />
              <input type="radio" name="gender" value="perempuan" />
              <label>Perempuan</label>
            </div>

            <div className="mb-3">
              <p>Alamat :</p>
              <div>
                <select>
                    <option value="">Provinsi</option>
                  </select>
                  <select>
                    <option value="">Kabupaten</option>
                  </select>
                  <select>
                    <option value="">Kecamatan</option>
                  </select>
                  <select>
                    <option value="">Kelurahan</option>
                  </select>
              </div>
            </div>

            <div className="mb-3">
              <p>Catatan</p>
              <textarea></textarea>
            </div>

            <div className="mb-3">
              <label>Sudah membayar iuran :</label>
              <input type="checkbox" />
            </div>
          </form>
          <input type="submit" />
        </div>
      </div>
    </div>
   </>
  )
}

export default App

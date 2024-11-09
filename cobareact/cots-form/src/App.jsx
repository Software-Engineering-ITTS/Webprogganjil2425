// import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
import 'bootstrap/dist/css/bootstrap.min.css'; 
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
// import './App.css'

function App() {
  // const [count, setCount] = useState(0)

  return (
    <>
      <div className="container-fluid p-5">
        <h1>Form Inventaris Barang PT ABC</h1>
        <Form action="">
          <Form.Group className="htmlForm-group my-4 px-5">
            <Form.Label htmlFor="txtKodeBarang">Kode Barang</Form.Label>
            <Form.Control type="text" id="txtKodeBarang" className="htmlForm-control" name="kodeBarang"
              placeholder="masukkan kode barang" />
          </Form.Group>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="txtNamaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="txtNamaBarang" className="htmlForm-control"
              placeholder="masukkan nama barang" />
          </div>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="selectCategory">Kategori Barang</label>
            <select name="category" id="selectCategory" className="htmlForm-control">
              <option value="stationery">Stationery</option>
              <option value="clothing">Clothing</option>
              <option value="f&b">Food And Beverages</option>
              <option value="furniture">Furniture</option>
              <option value="electronics">Electronics</option>
            </select>
          </div>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="inpDateDiterima">Tanggal Diterima</label>
            <input type="date" name="" id="inpDateDiterima" />
          </div>

          <div className="htmlForm-group my-4 px-5" id="tanggalExpiredhtmlForm" hidden={true}>
            <label htmlFor="inpDateExp">Tanggal Expired</label>
            <input type="date" name="" id="inpDateExp" />
          </div>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="inpAvailability">Ketersediaan Barang</label>
            <div className="htmlForm-check">
              <label htmlFor="inpAvailability">In Stock</label>
              <input type="radio" name="availability" id="inpAvailability" value="available"
                className="htmlForm-check-input" />
              <br />
              <label htmlFor="inpInAvailability">Out Of Stock</label>
              <input type="radio" name="availability" id="inpInAvailability" value="unavailable"
                className="htmlForm-check-input" />
            </div>

            <div className="htmlForm-group " id="inpNewStock" hidden={true}>
              <p>Stock Barang (Akumulasi)</p>
              <input type="number" className="htmlForm-control" name="stockBarang" id="inpStockBarang" />
            </div>
          </div>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="gudang">Gudang Penyimpanan</label>
            <div className="htmlForm-check">
              <label htmlFor="gudangA">Gudang A</label>
              <input type="checkbox" className="htmlForm-check-input" name="gudang" id="gudangA" />
              <br />
              <label htmlFor="gudangB">Gudang B</label>
              <input type="checkbox" name="gudang" className="htmlForm-check-input" id="gudangB" />
              <br />
              <label htmlFor="gudangC">Gudang C</label>
              <input type="checkbox" name="gudang" className="htmlForm-check-input" id="gudangC" />
            </div>
          </div>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="catatan-tambahan">Catatan Tambahan</label>
            <textarea name="" id="catatan-tambahan" className="htmlForm-control" placeholder="catatan tambahan" />
          </div>

          <div className="htmlForm-group my-4 px-5">
            <label htmlFor="inpVerifikasiPegawai">No Verifikasi Pegawai</label>
            <input type="password" name="" className="htmlForm-control" id="inpVerifikasiPegawai"
              placeholder="Masukkan Nomor Verifikasi Pegawai"></input>
            <label htmlFor="chkTogglePass">Tampilkan</label>
            <input type="checkbox" name="toglePass" className="htmlForm-check-input" id="chkTogglePass" />
          </div>

          <br />

          <div className="d-flex gap-3 justify-content-end mx-5">
            <input className="btn btn-outline-danger my-4 px-5" id="btnClear" type="button" value="clear" />
            <input id="btnSubmit" className="btn btn-primary my-4 px-5" type="button" value="submit" />
          </div>


        </Form>
      </div>
    </>
  )
}

export default App

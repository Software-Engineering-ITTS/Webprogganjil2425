import { useState } from 'react'
import 'bootstrap/dist/css/bootstrap.min.css';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';

function App() {

  return (
    <>
      <div className="container-fluid p-5">
        <h1>Form Inventaris Barang PT ABC</h1>
        <Form action="">
          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputKodeBarang">
            <Form.Label htmlFor="txtKodeBarang">Kode Barang</Form.Label>
            <Form.Control type="text" id="txtKodeBarang" className="htmlForm-control" name="kodeBarang"
              placeholder="masukkan kode barang" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputNamaBarang">
            <Form.Label htmlFor="txtNamaBarang">Nama Barang</Form.Label>
            <Form.Control type="text" name="namaBarang" id="txtNamaBarang" className="htmlForm-control"
              placeholder="masukkan nama barang" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="kategoriBarang">
            <Form.Label htmlFor="selectCategory">Kategori Barang</Form.Label>
            <Form.Select name="category" id="selectCategory" className="htmlForm-control">
              <option value="stationery">Stationery</option>
              <option value="clothing">Clothing</option>
              <option value="f&b">Food And Beverages</option>
              <option value="furniture">Furniture</option>
              <option value="electronics">Electronics</option>
            </Form.Select>
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputTanggalDiterima">
            <Form.Label htmlFor="inpDateDiterima">Tanggal Diterima</Form.Label>
            <Form.Control type="date" name="" id="inpDateDiterima" />
          </Form.Group>

          <Form.Group controlId="inputTanggalExpired" className="htmlForm-group my-4 px-5" id="tanggalExpiredhtmlForm" hidden={true}>
            <Form.Label htmlFor="inpDateExp">Tanggal Expired</Form.Label>
            <Form.Control type="date" name="" id="inpDateExp" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputAvailabilty">
            <Form.Label htmlFor="inpAvailability">Ketersediaan Barang</Form.Label>
            <br />
            <Form.Check

              label="In Stock"
              name="availability"
              type='radio'
              id="inpAvailability"
            />
            <Form.Check

              label="Out Of Stock"
              name="availability"
              type='radio'
              id="inpInAvailability"
            />

            <Form.Group className="htmlForm-group " id="inpNewStock" hidden={true} controlId="stockBarang">
              <Form.Label>Stock Barang (Akumulasi)</Form.Label>
              <Form.Control type="number" className="htmlForm-control" name="stockBarang" id="inpStockBarang" />
            </Form.Group>
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="Gudang Penyimpanan">
            <label htmlFor="gudang">Gudang Penyimpanan</label>
            <br />
            <Form.Check

              label="Gudang A "
              name="gudang"
              type='checkbox'
              id="gudangA"
            />
            <Form.Check

              label="Gudang B "
              name="gudang"
              type='checkbox'
              id="gudangB"
            />
            <Form.Check

              label="Gudang C "
              name="gudang"
              type='checkbox'
              id="gudangC"
            />

          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputCatatan">
            <Form.Label htmlFor="catatan-tambahan">Catatan Tambahan</Form.Label>
            <Form.Control as="textarea" name="" id="catatan-tambahan" className="htmlForm-control" placeholder="catatan tambahan" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputVerifikasiPegawai">
            <Form.Label htmlFor="inpVerifikasiPegawai">No Verifikasi Pegawai</Form.Label>
            <Form.Control type="password" name="" className="htmlForm-control" id="inpVerifikasiPegawai"
              placeholder="Masukkan Nomor Verifikasi Pegawai"></Form.Control>
            <Form.Check
              label="Tampilkan "
              name="toglepass"
              type='checkbox'
              id="chkTogglePass"
            />
            {/* <label htmlFor="chkTogglePass">Tampilkan</label>
            <input type="checkbox" name="toglePass" className="htmlForm-check-input" id="chkTogglePass" /> */}
          </Form.Group>
          <br />

          <Form.Group className="d-flex gap-3 justify-content-end mx-5">
            <Button variant="outline-danger" className="btn btn-outline-danger my-4 px-5" id="btnClear" type="button" value="clear" > Clear </Button>
            <Button variant="primary" id="btnSubmit" className="btn btn-primary my-4 px-5" type="button" value="submit" > Submit </Button>
          </Form.Group>

        </Form>
      </div>
    </>
  )
}

export default App

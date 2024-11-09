import { useState } from 'react'
import 'bootstrap/dist/css/bootstrap.min.css';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';

function App() {
  const [kodeBarang, setKodeBarang] = useState("");
  const [namaBarang, setNamaBarang] = useState("");
  const [category, setCategory] = useState("");
  const [showExpDate, setShowExpDate] = useState(false);
  const [availability, setAvailability] = useState(false);
  const [newStock, setNewStock] = useState(false);
  const [verifikasiPegawai, setVerifikasiPegawai] = useState("");
  const [passwordVisible, setPasswordVisible] = useState(false);
  const [catatanTambahan, setCatatanTambahan] = useState("");
  const [dateDiterima, setDateDiterima] = useState("");
  const [dateExp, setDateExp] = useState("");
  const [gudang, setGudang] = useState({ A: false, B: false, C: false });

  const handleFormSubmit = () => {
    
    event.preventDefault()
    if (!kodeBarang) {
      alert("Masukkan Kode Barang");
      return;
    }
    if (!namaBarang) {
      alert("Masukkan Nama Barang");
      return;
    }
    if (!category) {
      alert("Pilih Kategori Barang");
      return;
    }
    if (category === "f&b" && !dateExp) {
      alert("Masukkan Tanggal Expired untuk kategori F&B");
      return;
    }
    if (!verifikasiPegawai) {
      alert("Masukkan No Verifikasi Pegawai");
      return;
    }
    if (availability && !newStock) {
      alert("Masukkan Stok Baru jika Barang Tersedia");
      return;
    }
    if (!dateDiterima) {
      alert("Masukkan Tanggal Diterima");
      return;
    }
    if (!catatanTambahan) {
      alert("Tambahkan Catatan Tambahan");
      return;
    }
    if (!gudang.A && !gudang.B && !gudang.C) {
      alert("Pilih Gudang (A, B, atau C)");
      return;
    }

    if (!verifikasiPegawai) {
      alert("Masukkan No Verifikasi dulu")
      return
    }
    alert("Form Submitted")
  };

  const handleTogglePassword = () => {
    setPasswordVisible((prev) => !prev)
  }

  const handleCategoryChange = (e) => {
    let choosenCategory = e.target.value
    setCategory(choosenCategory);
    console.log(choosenCategory)
    setShowExpDate(choosenCategory === "f&b")
  }

  const handleStockAvailabilityChange = (status) => {
    setAvailability(status);
    setNewStock(status);
  }

  const handleClearForm = () => {
    if (window.confirm("Apakah Anda Yakin Ingin Mengosongkan Form?")) {
      setKodeBarang("")
      setNamaBarang("")
      setCategory("")
      setShowExpDate(false)
      setNewStock(false)
      setVerifikasiPegawai("")
      setCatatanTambahan("")
      setDateDiterima("")
      setDateExp("")
      setGudang({ A: false, B: false, C: false })
      setAvailability(false)


    }
  }

  const onCatatanChange = (e) => {
    setCatatanTambahan(e.target.value)
  }

  const onNamaBarangChange = (e) => {
    setNamaBarang(e.target.value)
  }

  const onKodeBarangChange = (e) => {
    setKodeBarang(e.target.value)
  }
  const onDateChange = (e) => {
    setDateDiterima(e.target.value)
  }

  const onExpDateChange = (e) => {
    setDateExp(e.target.value)
  }

  const onStockChange = (e) => {
    
    setNewStock(e.target.value)
  }

  const onVerifikasiChange = (e) =>{
    setVerifikasiPegawai(e.target.value)
  }

  return (
    <>
      <div className="container-fluid p-5">
        <h1>Form Inventaris Barang PT ABC</h1>
        <Form action="" >
          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputKodeBarang">
            <Form.Label htmlFor="txtKodeBarang">Kode Barang</Form.Label>
            <Form.Control value={kodeBarang} type="text" onChange={onKodeBarangChange} id="txtKodeBarang" className="htmlForm-control" name="kodeBarang"
              placeholder="masukkan kode barang" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputNamaBarang">
            <Form.Label htmlFor="txtNamaBarang">Nama Barang</Form.Label>
            <Form.Control type="text" value={namaBarang} name="namaBarang" onChange={onNamaBarangChange} id="txtNamaBarang" className="htmlForm-control"
              placeholder="masukkan nama barang" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="kategoriBarang">
            <Form.Label htmlFor="selectCategory">Kategori Barang</Form.Label>
            <Form.Select name="category" id="selectCategory" onChange={handleCategoryChange} value={category} className="htmlForm-control">
              <option value="">Pilih Kategori</option>
              <option value="stationery">Stationery</option>
              <option value="clothing">Clothing</option>
              <option value="f&b">Food And Beverages</option>
              <option value="furniture">Furniture</option>
              <option value="electronics">Electronics</option>
            </Form.Select>
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputTanggalDiterima">
            <Form.Label htmlFor="inpDateDiterima">Tanggal Diterima</Form.Label>
            <Form.Control type="date" value={dateDiterima} onChange={onDateChange} name="" id="inpDateDiterima" />
          </Form.Group>


          <Form.Group controlId="inputTanggalExpired" className="htmlForm-group my-4 px-5" id="tanggalExpiredhtmlForm" hidden={!showExpDate}>
            <Form.Label htmlFor="inpDateExp">Tanggal Expired</Form.Label>
            <Form.Control type="date" name="" id="inpDateExp" value={dateExp} onChange={onExpDateChange} />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputAvailabilty">
            <Form.Label htmlFor="inpAvailability">Ketersediaan Barang</Form.Label>
            <br />
            <Form.Check

              label="In Stock"
              name="availability"
              type='radio'
              checked={availability}
              onChange={() => handleStockAvailabilityChange(true)}
              id="inpAvailability"
            />
            <Form.Check

              label="Out Of Stock"
              name="availability"
              type='radio'
              onChange={() => handleStockAvailabilityChange(false)}
              checked={!availability}
              id="inpInAvailability"
            />

            <Form.Group className="htmlForm-group " id="inpNewStock" hidden={!availability} controlId="stockBarang">
              <Form.Label>Stock Barang (Akumulasi)</Form.Label>
              <Form.Control type="number" className="htmlForm-control" value={newStock} onChange={onStockChange} name="stockBarang" id="inpStockBarang" />
            </Form.Group>



          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="Gudang Penyimpanan">
            <label htmlFor="gudang">Gudang Penyimpanan</label>
            <br />
            <Form.Check
              label="Gudang A "
              name="gudang"
              checked={gudang.A}
              onChange={() => setGudang({ ...gudang, A: !gudang.A })}
              type='checkbox'
              id="gudangA"
            />
            <Form.Check

              label="Gudang B "
              name="gudang"
              checked={gudang.B}
              onChange={() => setGudang({ ...gudang, B: !gudang.B })}
              type='checkbox'
              id="gudangB"
            />
            <Form.Check

              label="Gudang C "
              name="gudang"
              checked={gudang.C}
              type='checkbox'
              onChange={() => setGudang({ ...gudang, C: !gudang.C })}
              id="gudangC"
            />

          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputCatatan">
            <Form.Label htmlFor="catatan-tambahan">Catatan Tambahan</Form.Label>
            <Form.Control as="textarea" onChange={onCatatanChange} value={catatanTambahan} name="" id="catatan-tambahan" className="htmlForm-control" placeholder="catatan tambahan" />
          </Form.Group>

          <Form.Group className="htmlForm-group my-4 px-5" controlId="inputVerifikasiPegawai">
            <Form.Label htmlFor="inpVerifikasiPegawai">No Verifikasi Pegawai</Form.Label>
            <Form.Control type={passwordVisible ? "text" : "password"} name="" value={verifikasiPegawai} onChange={onVerifikasiChange} className="htmlForm-control" id="inpVerifikasiPegawai"
              placeholder="Masukkan Nomor Verifikasi Pegawai"></Form.Control>
            <Form.Check
              label="Tampilkan "
              name="toglepass"
              onChange={handleTogglePassword}
              type='checkbox'
              id="chkTogglePass"
            />
            {/* <label htmlFor="chkTogglePass">Tampilkan</label>
            <input type="checkbox" name="toglePass" className="htmlForm-check-input" id="chkTogglePass" /> */}
          </Form.Group>
          <br />

          <Form.Group className="d-flex gap-3 justify-content-end mx-5">
            <Button variant="outline-danger" className="btn btn-outline-danger my-4 px-5" id="btnClear" onClick={handleClearForm} type="button" value="clear" > Clear </Button>
            <Button variant="primary" id="btnSubmit" className="btn btn-primary my-4 px-5" type="submit" value="submit" onClick={handleFormSubmit}> Submit </Button>
          </Form.Group>

        </Form>
      </div>
    </>
  )
}

export default App

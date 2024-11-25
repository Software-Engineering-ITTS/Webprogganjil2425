import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
  const [form, setForm] = useState({
    nama_text: "",
    tipe_gender: "",
    tipe_terbang: "",
    tipe_waktu: "",
    bandara_asal: "",
    bandara_tujuan: "",
    maskapai: "",
    harga: "",
    tipe_kursi: "",
    nomor_kursi: [],
    tambahan: "",
    pin: "",
  });
  const [submittedData, setSubmittedData] = useState(null);
  const [errors, setError] = useState({}); 

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    if (type === "checkbox" && name === "nomor_kursi") {
      setForm((prevForm) => ({
        ...prevForm,
        nomor_kursi: checked
          ? [...prevForm.nomor_kursi, value]
          : prevForm.nomor_kursi.filter((seat) => seat !== value),
      }));
    } 
    else {
      setForm((prevForm) => ({
        ...prevForm,
        [name]: value,
      }));
    }
  };

  const onSubmit = (e) => {
    e.preventDefault()
    const errors = validateForm(form) 
    console.log(errors)
    setError(errors);
    console.log(form);
    if (Object.keys(errors).length === 0) {
      console.log("call api post")
    } 
  }

  const validateForm = (form) => {
    const errors = {};
  if (!form.nama_text.trim()) {
    errors.nama_text = " Nama dibutuhkan!";
  }
  if (!form.tipe_gender) {
    errors.tipe_gender = " Tolong pilih gender!";
  }
  if (!form.tipe_terbang) {
    errors.tipe_terbang = " Jenis Penerbangan diperluhkan!";
  }
  if (!form.tipe_waktu) {
    errors.tipe_waktu = " Waktu Penerbangan dibutuhhan!";
  }
  if (!form.bandara_asal) {
    errors.bandara_asal = " Pilih Bandara Asal!";
  }
  if (!form.bandara_tujuan) {
    errors.bandara_tujuan = " Pilih Bandara Tujuan!";
  }
  if (!form.maskapai.trim()) {
    errors.maskapai = " Informasi Maskapai diperluhkan!";
  }
  if (!form.harga.trim()) {
    errors.harga = " Informasi Harga diperluhkan!";
  }
  if (!form.tipe_kursi) {
    errors.tipe_kursi = " Jumlah Kursi diperluhkan!";
  }
  if (form.nomor_kursi.length === 0) {
    errors.nomor_kursi = " Tolong pilih kursi yang diinginkan!";
  }
  if (!form.pin.trim()) {
    errors.pin = " PIN dibutuhkan!";
  } else if (form.pin.length < 4) {
    errors.pin = " PIN harus lebih dari 4 digit!";
  }
    return errors;
  }


  return (
    <form onSubmit={onSubmit}>
      <section className="box_luar">
        <div className="box_utama">
          <h1 className="judul_aplikasi">Form Penjualan Tiket Pesawat</h1>
          <div className="nama_pemesan">
            <label htmlFor="nama_text">Nama : </label>
            <input type="text" name="nama_text" id="nama_text" onChange={handleChange}/>
            <span>{errors.nama_text}</span>
          </div>
          <br />
          <div className="Gender">
            <p>Silahkan Pilih Gender Anda : </p>
            <input type="radio" id="g_laki2" name="tipe_gender" value="Laki-laki" onChange={handleChange}/>
            <label htmlFor="g_laki2"> Laki-laki</label><br />
            <input type="radio" id="g_perempuan" name="tipe_gender" value="Perempuan" onChange={handleChange}/>
            <label htmlFor="g_perempuan"> Perempuan</label><br />
            <span>{errors.tipe_gender}</span>
          </div>
          <br />
          <div className="jenis_terbang">
            <p>Jenis Penerbangan :</p>
            <input type="radio" id="p_domestik" name="tipe_terbang" value="Domestik" onChange={handleChange}/>
            <label htmlFor="p_domestik"> Domestik</label><br />
            <input type="radio" id="p_internasional" name="tipe_terbang" value="Internasional" onChange={handleChange}/>
            <label htmlFor="p_internasional"> Internasional</label><br />
            <span>{errors.tipe_terbang}</span>
          </div>
          <br />  
          <div className="waktu">
            <p>Pilih Waktu Penerbangan : </p>
            <input type="radio" id="pagi" name="tipe_waktu" value="Pagi" onChange={handleChange}/>
            <label htmlFor="pagi">Pagi</label><br />
            <input type="radio" id="siang" name="tipe_waktu" value="Siang" onChange={handleChange}/>
            <label htmlFor="siang">Siang</label><br />
            <input type="radio" id="sore" name="tipe_waktu" value="Sore" onChange={handleChange}/>
            <label htmlFor="sore">Sore</label><br />
            <input type="radio" id="malam" name="tipe_waktu" value="Malam" onChange={handleChange}/>
            <label htmlFor="malam">Malam</label><br />
            <span>{errors.tipe_waktu}</span>
          </div>
          <br />
          <div className="bandara_asal">
            <label htmlFor="bandara_asal">Pilih Bandara Asal : </label>
            <select name="bandara_asal" id="bandara_asal" onChange={handleChange}>
              <option value="Jakarta">Jakarta</option>
              <option value="Surabaya">Surabaya</option>
              <option value="Yogyakarta">Yogyakarta</option>
              <option value="Semarang">Semarang</option>
              <option value="Serang">Serang</option>
            </select>
            <span>{errors.bandara_asal}</span>
          </div>
          <br />
          <div className="bandara_tujuan">
            <label htmlFor="bandara_tujuan">Pilih Bandara Tujuan : </label>
            <select name="bandara_tujuan" id="bandara_tujuan" onChange={handleChange}>
              <option value="Kuala">Kuala Lumpur</option>
              <option value="Manila">Manila</option>
              <option value="Singapura">Singapura</option>
              <option value="Bangkok">Bangkok</option>
              <option value="Sydney">Sydney</option>
              <option value="Jakarta">Jakarta</option>
              <option value="Surabaya">Surabaya</option>
              <option value="Yogyakarta">Yogyakarta</option>
              <option value="Semarang">Semarang</option>
              <option value="Serang">Serang</option>
            </select>
            <span>{errors.bandara_tujuan}</span>
          </div>
          <br />
          <div className="maskapai">
            <label htmlFor="maskapai">Maskapai : </label>
            <input type="text" name="maskapai" id="maskapai" onChange={handleChange}/>
            <span>{errors.maskapai}</span>
          </div>
          <br />
          <div className="harga">
            <label htmlFor="p_harga">Harga : </label>
            <input type="text" name="harga" id="harga" onChange={handleChange}/>
            <span>{errors.harga}</span>
          </div>
          <br />
          <div className="jumlah_kursi">
            <p>Pilih Jumlah Kursi : </p>
            <input type="radio" id="k1" name="tipe_kursi" value="1" onChange={handleChange}/>
            <label htmlFor="k1">1</label>
            <input type="radio" id="k2" name="tipe_kursi" value="2" onChange={handleChange}/>
            <label htmlFor="k2">2</label>
            <input type="radio" id="k3" name="tipe_kursi" value="3" onChange={handleChange}/>
            <label htmlFor="k3">3</label>
            <input type="radio" id="k4" name="tipe_kursi" value="4" onChange={handleChange}/>
            <label htmlFor="k4">4</label>
            <input type="radio" id="k5" name="tipe_kursi" value="5" onChange={handleChange}/>
            <label htmlFor="k5">5</label>
            <span>{errors.tipe_kursi}</span>
          </div>
          <br />
          <div className="nomor_kursi" id="nomor_kursi">
            <p>Pilih Nomor Kursi : </p>
            <input type="checkbox" id="kursi1" name="nomor_kursi" onChange={handleChange}/>
            <label htmlFor="kursi1">Kursi 1</label>
            <input type="checkbox" id="kursi2" name="nomor_kursi" onChange={handleChange}/>
            <label htmlFor="kursi2">Kursi 2</label>
            <input type="checkbox" id="kursi3" name="nomor_kursi" onChange={handleChange}/>
            <label htmlFor="kursi3">Kursi 3</label>
            <input type="checkbox" id="kursi4" name="nomor_kursi" onChange={handleChange}/>
            <label htmlFor="kursi4">Kursi 4</label>
            <input type="checkbox" id="kursi5" name="nomor_kursi" onChange={handleChange}/>
            <label htmlFor="kursi5">Kursi 5</label>
            <span>{errors.nomor_kursi}</span>
          </div>
          <br />
          <div className="kebutuhan_tambahan">
            <p><label htmlFor="tambahan">Tuliskan Kebutuhan Tambahan Anda :</label></p>
            <textarea id="tambahan" name="tambahan" cols="40" rows="5" onChange={handleChange}></textarea>
          </div>
          <br />
          <div className="pin_password">
            <p>Pin Password Anda : </p>
            <label htmlFor="pin">PIN : </label>
            <input type="text" id="pin" name="pin" onChange={handleChange}/>
            <span>{errors.pin}</span>
          </div>
          <button type="submit" className="submit">Submit</button>
        </div>
      </section>
    </form>
  )
}

export default App
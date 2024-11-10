import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
import './App.css'

function App() {
  const [form, setForm] = useState({
    username: "",
    password: "",
    confirmPassword: "",
    kehadiran: "",
    alasan: "",
    lembur: "",
    date: ""
  });
  const [notification, setNotification] = useState("");
  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value
    });
  };
  const validateForm = () => {
    const newErrors = {};
    if (!form.username.trim()) newErrors.username = 'username is required';
    if (!form.password) newErrors.password = 'password is required';
    else if (form.password.length < 8)
      newErrors.password = 'Password harus 8 karakter';
    if (form.password !== form.confirmPassword)
      newErrors.confirmPassword = 'Password harus sama';
    if (!form.kehadiran) newErrors.kehadiran = 'harap isi kehadiran';
    if (!form.kehadiran) newErrors.buktiKehadiran = 'harap isi bukti kehadiran';
    if (!form.alasan) newErrors.alasan = 'harap isi alasan';
    if (!form.lembur) newErrors.lembur = 'harap isi lembur';
    if (!form.date) newErrors.date = 'harap isi tanggal';
    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

const onSubmit = (e) => {
  e.preventDefault();
  if (validateForm()){
      setNotification("Form berhasil disubmit!");
      setForm({
        username: "",
        password: "",
        confirmPassword: "",
        kehadiran: "",
        alasan: "",
        lembur: "",
        date: ""
      });
    }else{
      setNotification('form gagal di submit, cek jika ada error');
    }
  };

  return (
    <div className="container mt-5">
      <form onSubmit={onSubmit}>
        <h3 className="mb-3">Form Absensi</h3>
        
        <div className="mb-3">
          <label htmlFor="username" className="form-label">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            className="form-control"
            placeholder="Username"
            required
            onChange={handleChange}/>
            <span>{errors.username}</span>
        </div>

        <div className="mb-3">
          <label htmlFor="password" className="form-label">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            className="form-control"
            placeholder="Password"
            required
            onChange={handleChange}/>
            <span>{errors.password}</span>
        </div>
        <div className="mb-3">
          <label htmlFor="confirmPassword" className="form-label">Konfirmasi Password</label>
          <input
            type="password"
            id="confirm-password"
            name="confirmPassword"
            className="form-control"
            placeholder="Konfirmasi Password"
            required
            onChange={handleChange}/>
            <span>{errors.confirmPassword}</span>
    </div>

        <div className="mb-3">
          <label htmlFor="kehadiran" className="form-label">Kehadiran</label>
          <select
            className="form-select"
            id="kehadiran"
            name="kehadiran"
            value={form.kehadiran}
            onChange={handleChange}
            required
          >
            <option value="">Select Kehadiran</option>
            <option value="Hadir">&#128522; Hadir</option>
            <option value="Izin">&#128679; Izin</option>
            <option value="Tidak Masuk">&#10060; Tidak Masuk</option>
          </select>
          <span>{errors.kehadiran}</span>
  </div>
        

        <div className="mb-3">
          <label htmlFor="buktiKehadiran" className="form-label">Bukti Kehadiran</label>
          <input
            type="file"
            id="buktiKehadiran"
            name="buktiKehadiran"
            className="form-control"
            onChange={handleChange}
            required
          />
          <span>{errors.buktiKehadiran}</span>
      </div>

        <div className="mb-3">
          <label htmlFor="alasan" className="form-label">Alasan / Pekerjaan Hari ini </label>
          <textarea
            id="alasan"
            name="alasan"
            rows="3"
            className="form-control"
            placeholder="Alasan"
            required
            onChange={handleChange}/>
            <span>{errors.alasan}</span>
      </div>


        <div className="mb-3">
          <label className="form-label">Lembur</label>
          <div className="d-flex">
            <input
              type="radio"
              id="lembur-yes"
              name="lembur"
              value="Iya"
              required
              onChange={handleChange}/>
         <label htmlFor="lembur-yes" className="me-3">Iya</label>
            
            <input
              type="radio"
              id="lembur-no"
              name="lembur"
              value="Tidak"
              required
              onChange={handleChange}/>
            <label htmlFor="lembur-no">Tidak</label>
          </div>
          <span>{errors.lembur}</span>
    </div>

        <div className="mb-3">
          <label htmlFor="datepicker" className="form-label">Tanggal Kehadiran</label>
          <input
            type="date"
            id="datepicker"
            name="date"
            className="form-control"
            required
            onChange={handleChange} />
            <span>{errors.date}</span>
     </div>

        {notification && (
          <div className={`alert ${errors.length > 0 ? `alert-danger` : `alert-success`}`}>
            {notification}
          </div>
     )}

        <div className="d-flex justify-content-between mt-4">
          <button type="reset" className="btn btn-danger" onClick={() => setForm({})}>Reset</button>
          <button type="submit" className="btn btn-submit">Submit</button>
     </div>
      </form>
    </div>
  );
}

export default App;

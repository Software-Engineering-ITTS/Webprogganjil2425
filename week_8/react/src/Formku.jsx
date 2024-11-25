import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// import './App.css'

function App() {
  const [form, setForm] = useState({ username: "", password: "" })
  const [errors, setError] = useState({});
  const handledChange = (e) =>{
  const {name,value} = e.target
  setForm({
    ...form,
    [name] : value
  });
  }
  const onsubmit = (e) => {
    e.preventDefault()
    const errors = validateForm(form) 
    console.log(errors)
    setError(errors);
    if(Object.keys(errors).length === 0) {
      console.log("call api post")
    }
    //console.log(form)
  }

  const validateForm = (form) => {
    const errors = {};
    if(!form.username.trim()) {
      errors.username = "username is required"
    }
    if(!form.password){
      errors.password = "password is required"
    }
    return errors;
  }

  return (
    <>
    <form onSubmit={onsubmit}>
     <div className="container-fluid p-5" style={{ backgroundColor: 'aqua' }}>
        <div className="row mb-4">
            <div className="col text-center">
                <h1 className="text-light bg-dark py-3">Gaji Karyawan</h1>
            </div>
        </div>
        
        <div className="bg-white p-4 rounded shadow-sm">
            <div className="mb-3">
                <label htmlFor="Username" className="form-label">Username</label>
                <input type="text" id="username" name="username"  onChange={handledChange}/>
                <span>{errors.username}</span>
            </div>
            <div className="mb-3">
                <label htmlFor="pwd" className="form-label">Password</label>
                <input type="password" id="password" name="password"  onChange={handledChange}/>
                <span>{errors.password}</span>
            </div>
            <div className="mb-3">
                <label className="form-label">Nama</label>
                <input type="text" className="form-control"/>
            </div>
            <div className="mb-3">
                <label className="form-label">Tanggal</label>
                <input type="text" className="form-control"/>
            </div>

            <div className="mb-3">
                <label className="form-label">Gender</label><br/>
                <div className="form-check form-check-inline">
                    <input type="radio" id="male" name="Gender" className="form-check-input"/>
                    <label htmlFor="male" className="form-check-label">Laki laki</label>
                </div>
                <div className="form-check form-check-inline">
                    <input type="radio" id="female" name="Gender" className="form-check-input"/>
                    <label htmlFor="female" className="form-check-label">Perempuan</label>
                </div>
            </div>

            <div className="mb-3">
                <label className="form-label">Jabatan</label>
                <div className="dropdown">
                    <button className="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Jabatan
                    </button>
                    <ul className="dropdown-menu">
                        <li><a className="dropdown-item" href="#">CEO</a></li>
                        <li><a className="dropdown-item" href="#">Direktur</a></li>
                        <li><a className="dropdown-item" href="#">Manager</a></li>
                        <li><a className="dropdown-item" href="#">Karyawan</a></li>
                        <li><a className="dropdown-item" href="#">OB</a></li>
                    </ul>
                </div>
            </div>

            <div className="mb-3">
                <label className="form-label">Kendaraan</label><br/>
                <div className="form-check">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" className="form-check-input"/>
                    <label htmlFor="vehicle1" className="form-check-label">Mobil</label>
                </div>
                <div className="form-check">
                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car" className="form-check-input"/>
                    <label htmlFor="vehicle2" className="form-check-label">Motor</label>
                </div>
                <div className="form-check">
                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" className="form-check-input"/>
                    <label htmlFor="vehicle3" className="form-check-label">Sepeda</label>
                </div>
            </div>

            <div className="mb-3">
                <label htmlFor="floatingTextarea" className="form-label">Note</label>
                <textarea className="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            </div>

            <div className="text-center">
                <button type="submit" className="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
    </> 
  )
}

export default App

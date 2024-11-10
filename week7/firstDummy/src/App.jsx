import React from "react";
import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";
import { rounded } from "react";

function App() {
  const [form, setForm] = useState({ username: "", password: "" });
  const [errors, setError] = useState({});
  const handleChange = (e) => {
    // console.log(e.target.value);
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
    // const name = e.target.name
  };
  const OnSubmit = (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    // console.log(errors);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      console.log("gacor kang");
    }
    // console.log(form);
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.username.trim()) {
      errors.username = "username is required";
    }
    if (!form.password) {
      errors.password = "pass is reuired";
    } else if (form.password.length < 8) {
      errors.password = "minimal 8 bos";
    }
    return errors;
  };

  return (
    
    <>
        <div className="container">
        <form onSubmit={OnSubmit}>
          <h1 className="text-center justify-content-center">
            Sistem Akademik
          </h1>
          <rounded>

          <div
           
            style={{ backgroundColor: "rgb(29, 206, 219)" }}>
            <div className="col-md-6">
              <div>
                <p>Masukkan Nama: </p>
                <input type="text" /> <br /> <br />
              </div>
            </div>
            <div className="col-md-6">
              <div>
                <label for="root">nisn anda: </label>
                <input type="password" id="root" />
              </div>

              <div>
                <p>nilai semester anda?</p>
                <input type="radio" id="A" value="A" />
                <label for="A">A</label> <br />
                <input type="radio" id="B" value="B" />
                <label for="B">B</label> <br />
                <input type="radio" id="C" value="C" />
                <label for="C">C</label>
              </div>
            </div>
            <div>
              <p>Kelas Berapakah anda?</p>
              <select name="kelas">
                <option value="smp_vii">smp vii</option>
                <option value="smp_viii">smp viii</option>
                <option value="smp_ix">smp ix</option>
              </select>
            </div>
            <br />
            <div>
              <p>Jadwal Terfav anda</p>
              <input type="button" value="Senin" />
              <input type="button" value="Selasa" />
              <input type="button" value="Rabu" />
              <input type="button" value="Kamis" />
              <input type="button" value="Jumat" />
            </div>
            <br />
            <div>
              <p>pengalaman selama belajar dari awal</p>
              <textarea></textarea>
            </div>
            <br /> <br />
            <div>
              Pelajaran Fav anda
              <input type="text" />
            </div>
            <br />
            <div>
              <p>Waktu Kehadiran anda minggu ini</p>
              <input type="checkbox" id="Snn" value="Senin" />
              <label for="Snn"> Senin</label>
              <br />

              <input type="checkbox" id="sls" value="Selasa" />
              <label for="sls"> Selasa</label>
              <br />
              <input type="checkbox" id="rb" value="Rabu" />
              <label for="rb"> Rabu</label>
              <br />
              <input type="checkbox" id="kms" value="Kamis" />
              <label for="kms"> Kamis</label>
              <br />
              <input type="checkbox" id="jmt" value="Jumat" />
              <label for="jmt"> Jumat</label>
              <br />
              <input type="checkbox" id="SBT" value="Sabtu" />
              <label for="SBT"> Sabtu</label>
              <br />
              <input type="checkbox" id="Mngg" value="Minggu" />
              <label for="Mngg"> Minggu</label>
              <br />
            </div>
            {/* <br /> */}
            <div>
              <p>fasilitas favorit </p>
              <input type="textbox" /> <br /> <br />
            </div>
            <div>
              <select className="form-select mb-3" id="asal">
                <option value="">Asal</option>
              </select>
            </div>
          </div>
          </rounded>

        </form>
      </div>

    </>
  );
}

export default App;

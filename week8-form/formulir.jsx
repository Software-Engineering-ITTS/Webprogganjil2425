import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import './App.css'

function App() {
  const [form, setForm] = useState({
    namaevenet1: "",
    temaevent: "",
    pevent: "",
    gender: "",
    hari: "",
    tanggal: "",
    eventtype: "",
    eventDetails: "",
  });
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({ ...form, [name]: value });
    // const name = e.target.nama
  };

  const Onsubmit = (e) => {
    e.preventDefault();
    const errors = validateform(form);
    // console.log(errors);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      console.log("call api post");
    }

    // console.log(form);
  };

  const validateform = (form) => {
    const errors = {};
    if (!form.namaevenet1.trim()) {
      errors.namaevenet1 = "namaevent is required";
    }
    if (!form.temaevent) {
      errors.temaevent = "temaevent is required";
    }
    if (!form.pevent) {
      errors.pevent = "penyelenggara is required";
    }
    if (!form.gender) {
      errors.gender = "gender is required";
    }
    if (!form.hari) {
      errors.hari = "hari is required";
    }
    if (!form.tanggal) {
      errors.tanggal = "tanggal is required";
    }
    if (!form.eventtype) {
      errors.eventtype = "tipe event is required";
    }
    if (!form.eventDetails) {
      errors.eventDetails = "event details is required";
    }

    return errors;
  };

  return (
    <>
      <form onSubmit={Onsubmit}>
        <div
          style={{
            display: "flex",
            flexDirection: "column",
            alignItems: "center",
            justifyContent: "center",
            backgroundColor: "green",
          }}
        >
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label
              htmlFor="namaevent"
              id="namaevenet1"
              style={{ fontSize: "30px" }}
            >
              nama event
            </label>
            <input type="text" name="namaevent" onChange={handleChange}></input>
            <span>{errors.namaevenet1}</span>
            <br />
          </div>

          <div style={{ display: "flex", flexDirection: "column" }}>
            <label
              htmlFor="temaevent"
              id="temaevent"
              style={{ fontSize: "30px" }}
            >
              Tema event
            </label>
            <input type="text" name="temaevent" onChange={handleChange}></input>
            <span>{errors.temaevent}</span>
            <br />
          </div>

          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="pevent" id="pevent" style={{ fontSize: "30px" }}>
              nama penyelenggara
            </label>
            <input type="text" name="pevent" onChange={handleChange}></input>{" "}
            <span>{errors.pevent}</span>
            <br />
          </div>

          <div>
            <label
              htmlFor="mae"
              id="gender"
              style={{ fontSize: "20px", marginLeft: "50px" }}
            >
              gender
            </label>{" "}
            <br />
            <input
              type="radio"
              name="gende"
              value="laki laki"
              onChange={handleChange}
            />{" "}
            
            Laki-laki
            <input
              type="radio"
              name="gender"
              value="perempuan"
              onChange={handleChange}
            />{" "}
           
            perempuan
           
            <br />
            <span>{errors.gender}</span>
            <br />
            
          </div>

          <div>
            <label htmlFor="event" id="hari" style={{ marginLeft: "186px" }}>
              hari
              <br />
              <input
                type="checkbox"
                name="event"
                value="senin"
                onChange={handleChange}
              />{" "}
            
              <label For="event">senin</label>
              <input
                type="checkbox"
                name="event"
                value="selasa"
                onChange={handleChange}
              />{" "}
             
              <label For="event">selasa</label>
              <input
                type="checkbox"
                name="event"
                value="rabu"
                onChange={handleChange}
              />{" "}
              
              <label For="event">rabu</label>
              <input
                type="checkbox"
                name="event"
                value="kamis"
                onChange={handleChange}
              />{" "}
       
              <label For="event">kamis</label>
              <input
                type="checkbox"
                name="event"
                value="jumat"
                onChange={handleChange}
              />{" "}
             
              <label For="event">jumat</label>
              <input
                type="checkbox"
                name="event"
                value="sabtu"
                onChange={handleChange}
              />{" "}
        
              <label For="event">sabtu</label>
              <input
                type="checkbox"
                name="event"
                value="minggu"
                onChange={handleChange}
              />{" "}
              
              <label For="event">minggu</label>
            </label>
            <br />
            <span> {errors.hari}</span>
            <br />
          </div>

          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="tanggal" id="tanggal">
              kapan dilaksanakan
            </label>
            <input type="text" name="tanggal" onChange={handleChange}></input>{" "}
            <span>{errors.tanggal}</span>
            <br />
          </div>

          <div>
            <label htmlFor="eventType">Tipe acara</label>

            <select name="eventType" id="eventype" onChange={handleChange}>
              {" "}
              <span>{errors.eventtype}</span>
              <option value="workshop">workshop</option>
              <option value="workshop">seminar</option>
              <option value="workshop">konser</option>
              <option value="workshop">pertemuan</option>
            </select>
          </div>

          <div style={{ marginTop: "50px" }}>
            <div>
              <label for="eventDetails">Detail atau Catatan Acara:</label>
            </div>
            <input
              type="text"
              id="eventDetails"
              name="eventDetails"
              rows="4"
              cols="40"
              placeholder="Tambahkan detail atau catatan tentang acara"
              onChange={handleChange}
            ></input>{" "}
            <span>{errors.eventDetails}</span>
            <br />
          </div>
          <div>
            <button
              type="submit"
              style={{ marginTop: "16px", marginRight: "20px" }}
            >
              submit
            </button>

            <button type="reset" style={{ marginTop: "16px" }}>
              reset
            </button>
          </div>
        </div>
      </form>
    </>
  );
}

export default App;

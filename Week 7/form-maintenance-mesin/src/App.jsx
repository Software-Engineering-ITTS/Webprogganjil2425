import { useState } from "react";
import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";

function App() {
  const [form, setForm] = useState({ username: "", password: "" });
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({ ...form, [name]: value });
  };
  const OnSubmit = (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      console.log("call api post");
    }
  };

  const validateForm = (form) => {
    const errors = {};
    {
      if (!form.username.trim()) {
        errors.username = "username is required";
      }
      if (!form.password) {
        errors.password = "password is required";
      } else if (form.password.length < 8) {
        errors.password = "minimal password 8 karakter";
      }
    }
    return errors;
  };
  return (
    <>
      <div>
        <form onSubmit={OnSubmit}>
          <div id="login">
            <div className="login-text">
              <label htmlFor="">Username : </label>
              <input
                type="text"
                id="username"
                name="username"
                onChange={handleChange}
              />
              <span>{errors.username}</span>
              <br />
              <br />

              <label htmlFor="">Password : </label>
              <input
                type="password"
                id="password"
                name="password"
                onChange={handleChange}
              />
              <span>{errors.password}</span>
              <br />
              <br />
              <button className="submit-button" type="submit">
                Login
              </button>
            </div>
          </div>
        </form>

        <div id="header">
          <h3 style={{ marginTop: "50px" }}>
            Form Mengelola Jadwal dan Kebutuhan Pemeliharaan Mesin atau
            Peralatan
          </h3>
          <br />
          <br />
          <form>
            <h4>Maintenance Alat dan Produksi</h4>
            <br />
            <br />
            <label>Nama Petugas : </label>
            <input type="text" />
            <br />
            <br />

            <label>Frekuensi Maintenance : </label>
            <select>
              <option value="daily">Daily</option>
              <option value="weekly">Weekly</option>
              <option value="monthly">Monthly</option>
            </select>
            <br />
            <br />

            <label>List Alat : </label>
            <br />
            <div className="option-alat">
              <input type="checkbox" />
              <label>Mesin Oli</label>
              <br />
              <input type="checkbox" />
              <label>Kepala Silinder</label>
              <br />
              <input type="checkbox" />
              <label>Mesin Bensin</label>
            </div>
            <br />
            <br />

            <label>Maintenance Task : </label>
            <textarea name="task" id="task"></textarea>
            <br />
            <br />

            <label>Status : </label>
            <br />
            <input type="radio" id="progress" name="status" value="progress" />
            <label htmlFor="progress">On Progress</label>
            <br />
            <input
              type="radio"
              id="completed"
              name="status"
              value="completed"
            />
            <label htmlFor="completed">Completed</label>
            <br />
            <br />

            <h4>Maintenance Alat dan Konstruksi</h4>
            <br />
            <br />

            <label>Nama Petugas : </label>
            <input type="text" />
            <br />
            <br />

            <label>Frekuensi Maintenance : </label>
            <select>
              <option value="daily">Daily</option>
              <option value="weekly">Weekly</option>
              <option value="monthly">Monthly</option>
            </select>
            <br />
            <br />

            <label>List Alat : </label>
            <br />
            <div className="option-alat">
              <input type="checkbox" />
              <label>Mesin Oli</label>
              <br />
              <input type="checkbox" />
              <label>Kepala Silinder</label>
              <br />
              <input type="checkbox" />
              <label>Mesin Bensin</label>
            </div>
            <br />
            <br />

            <label>Maintenance Task : </label>
            <textarea name="task" id="task"></textarea>
            <br />
            <br />

            <label>Status : </label>
            <br />
            <input
              type="radio"
              id="progress2"
              name="status2"
              value="progress"
            />
            <label htmlFor="progress2">On Progress</label>
            <br />
            <input
              type="radio"
              id="completed2"
              name="status2"
              value="completed"
            />
            <label htmlFor="completed2">Completed</label>
            <br />
            <br />

            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
          </form>
        </div>
      </div>
    </>
  );
}

export default App;

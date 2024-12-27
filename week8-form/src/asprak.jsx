import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import './App.css'

function App() {
  const [form, setForm] = useState({ username: "", password: "" });
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
    if (!form.username.trim()) {
      errors.username = "username is required";
    }
    if (!form.password) {
      errors.password = "password is required";
    }
    return errors;
  };
  return (
    <>
      <form onSubmit={Onsubmit}>
        <div style={{ display: "flex", flexDirection: "column" }}>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="username" id="username">
              username
            </label>
            <input type="text" name="username" onChange={handleChange}></input>
            <span>{errors.username}</span>
          </div>

          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="password" id="password">
              password
            </label>
            <input
              type="password"
              name="password"
              onChange={handleChange}
            ></input>
            <span>{errors.password}</span>
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            Login
          </button>
        </div>
      </form>
    </>
  );
}

export default App;

import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import './App.css'

function App() {
  // const [count, setCount] = useState(0);
  const [form, setForm] = useState({ username: "", password: "" });
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    // console.log(e.target.name);
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
    // console.log(errors);
    // console.log(form);
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
    // tidak boleh ada 2 tag yang sama, kecuali menggunakan ini pakai classname jangan class
    // <>
    // <div></div>
    // <div></div>
    // </>

    <>
      <form onSubmit={OnSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}
        >
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">username</label>
            <input
              type="text"
              name="username"
              id="username"
              onChange={handleChange}
            />
            <span>{errors.username}</span>
          </div>
          <br />
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor=""> password</label>
            <input
              type="text"
              name="password"
              id="password"
              onChange={handleChange}
            />
          </div>
          <span>{errors.password}</span>
        </div>
        <button type="submit" style={{ marginTop: "16px" }}>
          Login
        </button>
      </form>
    </>
  );
}

export default App;

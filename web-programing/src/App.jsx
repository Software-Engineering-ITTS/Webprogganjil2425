import { useState } from "react";
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
// import './App.css'
import "./styleMe.css";

function App() {
  const [form, setForm] = useState({ username: "", password: "" });
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
  };

  const onSubmit = (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      console.log("call api post");
    }
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.username.trim()) {
      errors.username = "username is required";
    }
    if (!form.password) {
      errors.password = "password is required";
    } else if (form.password.length < 8) {
      errors.password = "minimal password 8 karakter";
    }
    return errors;
  };

  return (
    <div className="form-container">
      <form onSubmit={onSubmit}>
        <h2 style={{ marginBottom: "20px" }}>
          Tak EDit dikit ga ngaruh kan mas 😊{" "}
        </h2>
        <div className="form-content">
          <div className="form-group">
            <label htmlFor="username">Username:</label>
            <input
              type="text"
              name="username"
              id="username"
              onChange={handleChange}
            />
            {errors.username && (
              <span className="error-message" >
                {errors.username}
              </span>
            )}
          </div>
          <div className="form-group">
            <label htmlFor="password">Password:</label>
            <input
              type="password"
              name="password"
              id="password"
              onChange={handleChange}
            />
            {errors.password && (
              <span className="error-message">{errors.password}</span>
            )}
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            Login
          </button>
        </div>
      </form>
    </div>
  );
}

export default App;

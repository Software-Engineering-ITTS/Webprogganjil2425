import { useState } from 'react';

const [form, setForm] = useState({ username: "", password: "" });
const [error, setError] = useState({});

const handleChange = (e) => {
  const { name, value } = e.target;
  setForm(prevForm => ({ ...prevForm, [name]: value }));
};

const onSubmit = (e) => {
  e.preventDefault();
  const errors = validateForm(form);
  console.log(errors);
  
  if (Object.keys(errors).length === 0) {
    console.log("call API POST");
  } else {
    setError(errors);
  }
};

const validateForm = (form) => {
  const errors = {};
  if (!form.username.trim()) {
    errors.username = "Username is required";
  }

  if (!form.password) {
    errors.password = "Password is required";
  } else if (form.password.length < 8) {
    errors.password = "Password must be at least 8 characters";
  }

  return errors;
};

function App() {
  return (
    <>
      <form onSubmit={onSubmit}>
        <div style={{ display: "flex", flexDirection: 'column', width: "400px" }}>
          <div style={{ display: 'flex', flexDirection: "column" }} >
            <label htmlFor="username">Username</label>
            <input
              type="text"
              name="username"
              id="username"
              value={form.username}
              onChange={handleChange}
            />
            {error.username && <span>{error.username}</span>}
          </div>
          <div style={{ display: 'flex', flexDirection: "column" }}>
            <label htmlFor="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              value={form.password}
              onChange={handleChange}
            />
            {error.password && <span>{error.password}</span>}
          </div>
          <button type="submit" style={{ marginTop: "17px" }}>Login</button>
        </div>
      </form>
    </>
  );
}

export default App;

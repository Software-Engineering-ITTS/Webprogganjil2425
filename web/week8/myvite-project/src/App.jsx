import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

const [form, setForm] = useState({ username: "", password: "" });
const [error, setError] = useState({});

const handleChange = (e) => {
  const (name, value) = e.target
  setForm { {..form,[name] = value}};
}

const OnSubmit = (e) => {
  e.preventDefault();
  const errors = validteForm(form);
  console.log(errors)
  // console.log(form);
  if (Object.keys(errors).length === 0) {
    console.log("call api post")
  }
}

const validateForm = (form) => {
  const error = {};
  if (!form.username.trim()) {
    errors.username = "required"
  }

  if (!form.password) {
    errors.password = "password is required"
  } else if (form.password.length < 8) {
    errors.password = "minimal password 8 karakter"
  }
  return errors;

}


function App() {

  return (
    <>
      <form onSubmit={OnSubmit} >
        <div style={{ display: "flex", flexDirection: 'column', width: "400px" }}>
          <div style={{ display: 'flex', flexDirection: "column" }} >
            <label htmlFor="">Username</label>
            <input type="text" name='username' id='username' onChange={handleChange} />
            <span>{error.username}</span>
          </div>
          <div style={{ display: 'flex', flexDirection: "column" }}>
            <label htmlFor="">Password</label>
            <input type="text" name='password' id='password' onChange={handleChange} />
            <span>{error.password}</span>
          </div>
          <button type='submit' style={{ marginTop: "17px" }}>Login</button>
        </div>
      </form>
    </>
  )
}

export default App
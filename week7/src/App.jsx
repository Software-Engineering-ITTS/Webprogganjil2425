import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

function App() {
  const [form, setForm] = useState({username: "", password: ""});
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    const {name, value} = e.target
    setForm({...form, [name]: value});
  }


  const OnSubmit = (e) =>{
    e.preventDefault();
    const errors = validateForm(form);
    console.log(errors);
    // console.log(form);
  }

  const validateForm = (form) => {
    const errors = {};
    if(!form.username.trim()) {
      errors.username = "Username is required";
    }
    if (!form.password) {
      errors.password = "Password is required";
    }else if (form.password.length < 8) {
      errors.password = "Password must be at least 8 characters";
    }
    return errors;
  }

  return (
   <>
  <form onSubmit={OnSubmit}>
    <div style={{display:"flex", flexDirection: "column",width: "400px"}}>
      <div style={{display: 'flex', flexDirection: "column"}}>
        <label htmlFor="">username</label>
        <input type="text" name='username' id='username' onChange={handleChange} />
        <span>error</span>
      </div>
      <div style={{display: 'flex', flexDirection: 'column'}}>
        <label htmlFor="">password</label>
        <input type="text" name='password' id='password' onChange={handleChange} />
        <span>error</span>
      </div>
      <button type='submit' style={{marginTop: "16px"}}>Login</button>
    </div>
    </form>
   </>
  )
}

export default App
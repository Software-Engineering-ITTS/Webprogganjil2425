import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

function App() {
  const [form, setForm] = useState({username: "", password: ""});
  const [errors, setError] = useState({});
  
  const handleChange = (e) =>{
    const {name, value} = e.target
    setForm({...form,[name]:value});
  }



  const OnSubmit = (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    // console.log(errors);
    setError(errors);
    if(Object.keys(errors).length === 0){
      console.log("call api post")
    }
    // console.log(form);
  }
  
  const validateForm = (form) =>{
    const errors = {};
    if (!form.username.trim()){
      errors.username = "username is required"
    }
    if (!form.password){
      errors.password = "password is required"
    }else if(form.password.length < 8){
      errors.password = "minimal password 8 character"
    }
    return errors;
  }
  return (
    <>
    <form onSubmit={OnSubmit}>
    <div style={{display:"flex", flexDirection: "column", width: "400px"}}>
    <div style={{display: "flex", flexDirection: "column"}}>
      <label htmlFor="">username</label>
      <input type="text" name='username' id='username' onChange={handleChange}/>
      <span>{errors.username}</span>
    </div>
    <div style={{display:"flex", flexDirection: "column"}}>
      <label htmlFor="">password</label>
      <input type="text" name='password' id='password' onChange={handleChange}/>
      <span>{errors.password}</span>
    </div>
    <button type='submit' style={{marginTop: "16px"}}>login</button>
    </div>
    </form>
</>
  )
}

export default App

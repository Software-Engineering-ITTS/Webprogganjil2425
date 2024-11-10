import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
//import './App.css'

function App() {
  const [form, setForm] = useState({username:"", password:""});
  const [errors, setError] = useState({});

  const handleChange = (e) => {
  const {name, value} = e.target
  setForm({
    ...form,
    [name]:value
  })
  }
  
  const OnSubmit = (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if(Object.keys(errors).length === 0){
      console.log("call api post")
    }
  }

  const validateForm = (form) =>{
    const errors = {};
    if (!form.username.trim()){
      errors.name = "required"
      console.log(
        errors.name = "required"
      );
    }
    if (!form.password){
      errors.password = "password is required"
      console.log(
      errors.password = "password is required"

      );
    } else if(form.password.length < 8){
      errors.password = "minimal 8 ya"
console.log(
  errors.password = "minimal 8 ya"
);
    }
    return errors;
  }

  return (
    <>
    <form onSubmit={OnSubmit}>
      <div style={{display:"flex", flexDirection:"column", width:"400px"}}>
        <div style={{display:"flex", flexDirection:"column"}}>
          <label htmlFor="">username</label>
          <input type="text" name='username' id='username' onChange={handleChange}/>
          <span>{errors.name}</span>
        </div>
        <div style={{display: "flex", flexDirection: "column"}}>
          <label htmlFor="">password</label>
          <input type="text" name='password' id='password' onChange={handleChange}/>
          <span>{errors.password}</span>
        </div>
        <button type='submit' style={{marginTop:"16px"}}>Login</button>
      </div>
    </form>
    </>
  )
}

export default App
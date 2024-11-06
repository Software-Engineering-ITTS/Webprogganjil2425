import { useState } from 'react'

function App() {

  const [form, setForm] = useState({username:"", password:""})
  const [errors, sertError] = useState({})

  const handleChange = (e) => {
    const {name, value} = e.target
    setForm({
      ...form,
      [name]:value
    })
  }

  const validateForm = (form) => {
    const errors = {}

    if(!form.username.trim()){
      errors.username = "username required"
    } 

    if (!form.password){
      errors.password = "password required"
    } else if (form.password.length < 8) {
      errors.password = "minimal password 8 char"
    }

    return errors
  }


  const onSubmit = (e) => {
    e.preventDefault()
    const errors = validateForm(form)
    // console.log(errors)
    sertError(errors)
    if(Object.keys(errors).length === 0){
      console.log('cihuy')
    }

  }

  return (
    <div>
      <form onSubmit={onSubmit}>
          <div style={{display:"flex", flexDirection:"column", width:"400px"}}>
              <div style={{display:"flex", flexDirection:"column"}}>
                 <label htmlFor="">UserName</label>
                 <input type="text" name='username' id='username' onChange={handleChange}/>
                 <span>{errors.username}</span>
              </div>

              <div style={{display:"flex", flexDirection:"column"}}>
                 <label htmlFor="">Password</label>
                 <input type="text" name='password' id='password' onChange={handleChange}/>
                 <span>{errors.password}</span>
              </div>
           </div>
           <button type='submit' style={{marginTop:'17px'}}>Login</button>
       </form>
    </div>
  )
}

export default App

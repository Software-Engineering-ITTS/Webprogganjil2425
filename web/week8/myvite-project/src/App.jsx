import { useEffect, useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
import './App.css'

function App() {
  // const [users, setUsers] = useState([]);
  const [form, setForm] = useState({username: "", password: ""});
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    const {name, value} = e.target
    setForm({...form, [name]: value});
  }

  // useEffect(() => {
  //   fetchUser()
  // },[])

  const fetchUser = async () => {
   try{
    const response = await fetch("//http://localhost/myvite-project/backend/lihatdata.php"
    );
    const data = await response.json();
    // setUsers(data);
    console.log(data);
   } catch(error) {
    console.log(error)
   }
  };


  const OnSubmit = (e) =>{
    e.preventDefault();
    const errors = validateForm(form);
    //console.log(errors);
    setError(errors);
    if(Object.keys(errors).length === 0){
      console.log("call api post")
    }
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
        <span>{errors.username}</span>
      </div>
      <div style={{display: 'flex', flexDirection: 'column'}}>
        <label htmlFor="">password</label>
        <input type="text" name='password' id='password' onChange={handleChange} />
        <span>{errors.password}</span>
      </div>
      <button type='submit' style={{marginTop: "16px"}}>Login</button>
    </div>
  </form>

  <h2>Data User</h2>
  <table>
    <th>
      <tr>NIM</tr>
      <tr>Nama</tr>
      <tr>Actions</tr>
    </th>
    {/* <tbody>
      {users.map((user)=> {
        <tr key={user.id}>
          <td>{user.Nim}</td>
          <td>{user.Nama}</td>
          <td>
            <button>Edit</button>
            <button>Delete</button>
          </td>
        </tr>;
      })}
    </tbody> */}
  </table>
   </>
  )
}

export default App
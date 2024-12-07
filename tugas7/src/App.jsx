import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

function App() {
  const [users, setUsers] = useState([])
  const [form, setForm] = useState({ username: "", password: "" })
  const [errors, setError] = useState({});

  const handledChange = (e) =>{
  const {name,value} = e.target
  setForm({
    ...form,
    [name] : value
  });
  }

  useEffect(() => {
    fetchUser()
  },[])

  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/NEW_Projects/backend/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch(error){
      console.log(error);
    }
  };

  const onsubmit = async (e) => {
    // e.preventDefault()
    const errors = validateForm(form) 
    setError(errors);
    if(Object.keys(errors).length === 0) {
      const url = "http://localhost/NEW_Projects/backend/simpandata.php"
      
      
      try {
        const response = await fetch(url, {
          method : "POST",
          headers : {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(form),
        });
        fetchUser();
        setForm({userID: null, nim: "", nama:""});
      } catch (error){
        console.log(error);
      }
    }
  };


  const deleteData = async (userID) => {
    const url = "http://localhost/NEW_Projects/backend/hapusdata.php" 

    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body : JSON.stringify({ userID}),
      });
      const data = await response.json();
      fetchUser();
    } catch (error){
      console.log(error);
    }
  };



  const validateForm = (form) => {
    const errors = {};
    if(!form.username.trim()) {
      errors.username = "username is required"
    }
    if(!form.password){
      errors.password = "password is required"
    }
    else if(form.password.length < 8){
      errors.password = "minimal password 8 karakter"
    }
    return errors;
  }

  return (
    <>
      <form onSubmit={onsubmit}>
        <div style={{ display: "flex", flexDirection: "column", width: "400px" }}>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="" style={{ color: "red" }}>Username</label>
            <input type="text" name="username" id="username" onChange={handledChange}></input>
            <span>{errors.username}</span>
          </div>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">Password</label>
            <input type="text" name="password" id="password" onChange={handledChange}></input>
            <span>{errors.password}</span>
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>Login</button>
        </div>
      </form>



      <h2>Data User</h2>
      <table border={1}>
        <thead>
          <tr>
            <td>Nim</td>
            <td>Nama</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.userID}>
              <td>{user.nim}</td>
              <td>{user.nama}</td>
              <td>
                <button>Edit</button>
                <button onClick={() =>{
                  deleteData(user.userID);
                }}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </>
  )
}
export default App
import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

function App() {
  const [users, setUsers] = useState([])
  const [form, setForm] = useState({nim: '', nama: ''})
  const [errors, setError] = useState({})

  const handleChange = (e) => {
    const {name, value} = e.target
    setForm ({
      ...form,
      [name]:value
    });
  }

  useEffect(() => {
    fetchUser()
  }, [])

  const fetchUser = async () => {
    try{
      const response = await fetch("http://localhost/PHPPROJECT/backend/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch(error) {
      console.log(error)
    }
  };

  const deleteData = async (userid) => {
    const url = "http://localhost/PHPPROJECT/backend/delete.php"
    try {
       const response = await fetch(url,{
        method: "POST",
        headers:{
          "Content-Type" : "Application/json",
        },
        body: JSON.stringify({ userid }),
      });
      const data = await response.json();
      fetchUser();
    } catch (error){
      console.log(error);
    }
  };

  const OnSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    
    setError(errors);
    if(Object.keys(errors).length === 0){
      // console.log("call api post")
      const url = "http://localhost/PHPPROJECT/backend/tambahdata.php"

      try {
        const response = await fetch(url, {
          method: "POST",
          header: {
            "Content-Type": "application/json",
          },
           body: JSON.stringify(form),
          });
          const data = await response.json();
          fetchUser();
          setForm({ userid: null, nim: '', nama: ''});
        } catch (error) {
          console.log(error);
        }
      }
  };

  const edit = (user) => {
    setForm({
      userid: user.userid,
      nim: user.nim,
      nama: user.nama,
    });
  };
    
  const validateForm = (form) =>{
    const errors = {};
    if (!form.nim.trim()) {
      errors.nim = "required"
    }
    if(!form.nama) {
      errors.nama = "nama is required"
    } else if (form.nama.length < 8){
      errors.nama = "minimal nama 8 karakter"
    }
    return errors;
  };
  
  return (
    <>
    <form onSubmit={OnSubmit}>
    <div style={{display:"flex", flexDirection: "column"}}>
    <div style={{display:"flex", flexDirection: "column"}}>
      <label htmlFor='nim'>nim</label>
      <input type='text' name='nim' id='nim' value={form.nim} onChange={handleChange}></input>
      <span>{errors.nim}</span>
    </div>

    <div style={{display:"flex", flexDirection: "column"}}>
      <label htmlFor='nama'>nama</label>
      <input type='text' name='nama' id='nama' value={form.nama} onChange={handleChange}></input>
      <span>{errors.nama}</span>
    </div>
    <button type='submit' style={{marginTop:"16px"}}>
      {form.userid ? 'Update' : 'Tambah'}
      </button>
    </div>
    </form>

    <h2>Data User</h2>
    <table border={1}>
      <thead>
        <tr>
        <td>Nim</td>
        <td>Nama</td>
        <td>Action</td>
        </tr>
      </thead>
      <tbody>
      {users.map((user) => (
          <tr key={user.userid}>
            <td>{user.nim}</td>
            <td>{user.nama}</td>
            <td>
              <button onClick={() => {
                edit(user);
              }}>Edit</button>
              <button onClick={() => {
                deleteData(user.userid);
              }}>Delete</button>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
    </>
  );
}

export default App;


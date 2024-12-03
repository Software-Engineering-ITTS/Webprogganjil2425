import { useEffect, useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import "./App.css";

function App() {
  const [errors, setError] = useState({});
  const [form, setForm] = useState({ nama: "", nim: "" });
  const [users, setUsers] = useState([]);
  
  const handleChange = (e) => {
    const {name, value} = e.target;
    setForm({
      ...form,
      [name] : value
    });
    // const name = e.target.name
    // const value = e.target.value
  }

  useEffect(() => {
    fetchUser()
  }, [])

  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/WebWeek8/week9/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch(error) {
      console.log(error)
    }
  };

  const deleteData = async (userid) => {
    const url = "http://localhost/WebWeek8/week9/hapusdata.php"
    try {
        const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({userid}),
      });
      const data = await response.json();
      fetchUser();
    } catch (error) {
      console.log(error);
    }
  }
  
  const onSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    // console.log(errors)
    setError(errors);
    if (Object.keys(errors).length === 0) {
      //console.log("call api post")
      const url = "http://localhost/WebWeek8/week9/simpandata.php"

      try {
        await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(form),
        });
        fetchUser();  
        setForm({userid: null, nim: "", nama: ""});
      } catch (error) {
        console.log(error);
      }
    }
    // console.log(form);
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.nim) {
      errors.nim = "nim is required"
    }
    if (!form.nama.trim()) {
      errors.nama = "nama is required"
    } 
    //else if (form.password.length < 8) {
     // errors.password = "minimal password 8 karakter"
   // }
    return errors;
  }

  return (
    <>
      <form onSubmit={onSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">nim</label>
            <input type="text" name="nim" id="nim" onChange={handleChange} />
            <span>{errors.nim}</span>
          </div>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">nama</label>
            <input type="text" name="nama" id="nama" onChange={handleChange} />
            <span>{errors.nama}</span>
          </div>
        </div>
        <button type="submit" style={{marginTop: "16px"}}>Login</button>
      </form>

      <h2>Data User</h2>
      <table border="1">
        <thead>
        <tr>
          <td>NIM</td>
          <td>Nama</td>
          <td>Actions</td>
        </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.userid}>
            <td>{user.nim}</td>
            <td>{user.nama}</td>
            <td>
              <button
              onClick={() => {
                deleteData(user.userid)
              }}
              >
              Delete
              </button>
            </td>
          </tr>
          ))}
        </tbody>
      </table>
    </>
  );

}

export default App;
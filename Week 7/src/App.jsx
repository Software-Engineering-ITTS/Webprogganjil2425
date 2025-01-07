import { useState, useEffect } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import "./App.css";

function App() {
  const [form, setForm] = useState({ nim: "", nama: "", userid: null });
  const [errors, setError] = useState({});
  const [users, setUsers] = useState([]);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value
    });
    // const name = e.target.name
    // const value = e.target.valu
  };

  useEffect(() => {
    fetchUser()
  }, [])



  const fetchUser = async () => {
    try {
      const response = await fetch("http://localhost/phpproject/backend/lihatdata.php");
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch (eror) {
      console.log(eror)
    }
  };


  // untuk hapus data
  const deleteData = async (userid) => {
    const url = "http://localhost/phpproject/backend/hapusdata.php"
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ userid }),
      });
      const data = await response.json();
      fetchUser();

    } catch (error) {
      console.log(error);
    }
    //console.log("call api post")
  };
  // console.log(form);


  // untuk edit data
  const editData = async (formData) => {
    try {
      const response = await fetch("http://localhost/phpproject/backend/editdata.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          }, body: JSON.stringify(formData),
        });
      const data = await response.json();
      fetchUsers();
      setForm({ userid: null, nim: "", nama: "" });
    } catch (error) {
      console.error(error);
    }
  };
  const handleEdit = (user) => {
    setForm({ userid: user.userid, nim: user.nim, nama: user.nama, }

    );
  };



  const onSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    // console.log(errors)
    setError(errors);
    if (Object.keys(errors).length === 0) {
      const url = from.userid
        ? "http://localhost/phpproject/backend/editdata.php"
        : "http://localhost/phpproject/backend/simpandata.php";

      try {
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(form),
        });

        const data = await response.json();
        console.log(data.message);
        fetchUser();
        setForm({ userid: null, nim: "", nama: "" });
      } catch (error) {
        console.log(error);
      }
      //console.log("call api post")
    }
    // console.log(form);
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.nim) {
      errors.nim = "NIM is Required";
    }
    if (!form.nama) {
      errors.nama = "Nama is Required";
    }
    // if (!form.username.trim()) {
    //   errors.username = "username is required"

    // }
    // if (!form.password) {
    //   errors.password = "password is required"
    // } else if (form.password.length < 8) {
    //   errors.password = "minimal password 8 karakter"
    // }
    return errors;
  };

  return (
    <>
      <form onSubmit={onSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}
        >
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">NIM</label>
            <input type="text" name="username" id="username" onChange={handleChange} />
            <span>{errors.nim}</span>
          </div>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">NAMA</label>
            <input type="text" name="password" id="password" onChange={handleChange} />
            <span>{errors.nama}</span>
          </div>
        </div>
        <button type="submit" style={{ marginTop: "16px" }}>Login</button>
      </form>


      <h2>Data User</h2>
      <table border="1">
        <thead>
          <tr>
            <td> NIM </td>
            <td> NAMA </td>
            <td> ACTIONS </td>
          </tr>
        </thead>


        <tbody>
          {users.map((user) => (
            <tr key={user.userid}>
              <td>{user.nim}</td>
              <td>{user.nama}</td>
              <td>
                <button onClick={() => handleEdit(user)}>Edit</button>
                <button onClick={() => deleteData(user.userid)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>


    </>
  );
}

export default App;
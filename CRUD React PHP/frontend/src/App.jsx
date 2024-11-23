import { useEffect, useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import "./App.css";

function App() {
  const [users, setUsers] = useState([]);
  const [form, setForm] = useState({ userid: "", nim: "", nama: "" });
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
    // const name = e.target.name
    // const value = e.target.value
  };

  useEffect(() => {
    fetchUser();
  }, []);

  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/phpproject/backend/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch (error) {
      console.log(error);
    }
  };

  const editData = async (user) => {
    setForm({
      userid: user.userid,
      nim: user.nim,
      nama: user.nama,
    })
  };

  const deleteData = async (userid) => {
    const url = "http://localhost/phpproject/backend/hapusdata.php";
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "aplication/json",
        },
        body: JSON.stringify({ userid }),
      });
      const data = await response.json();
      fetchUser();
    } catch (error) {
      console.log(error);
    }
  };

  const onSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      // console.log("call api post");
      const url = "http://localhost/phpproject/backend/simpandata.php";
      try {
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "aplication/json",
          },
          body: JSON.stringify(form),
        });
        fetchUser();
        setForm({ id: "null", nim: "", nama: "" });
      } catch (error) {
        console.log(error);
      }
    }
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.nim.trim()) {
      errors.nim = "NIM is required";
    }
    if (!form.nama.trim()) {
      errors.nama = "Name is required";
    }
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
            <input type="text" name="nim" id="nim" value={form.nim} onChange={handleChange} />
            <span>{errors.nim}</span>
          </div>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">Nama</label>
            <input type="text" name="nama" id="nama" value={form.nama} onChange={handleChange} />
            <span>{errors.nama}</span>
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            Simpan
          </button>
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
            <tr key={user.userid}>
              <td>{user.nim}</td>
              <td>{user.nama}</td>
              <td>
                <button onClick={() => {editData(user)}}>Edit</button>
                <button onClick={() => {deleteData(user.userid)}}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </>
  );
}

export default App;
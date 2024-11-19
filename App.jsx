import { useEffect, useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
// import "./App.css";

function App() {
  const [form, setForm] = useState({ nama: "", nim: "" });
  const [errors, setError] = useState({});
  const [users, setUsers] = useState([]);
  
  const handleChange = (e) => {
    const {name, value} = e.target;
    setForm({
      ...form,
      [name] : value
    });
  }

  useEffect(() => {
    fetchUser()
  }, [])

  const fetchUser = async () => {
    // console.log("test")
    try {
      const response = await fetch("http://localhost:8080/database/backend/lihatdata.php");
      // console.log(response);
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch(error) {
      console.log(error)
    }
  };

  const handleDelete = async (userid) => {
    try {
      const response = await fetch(`http://localhost:8080/database/backend/delete.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ userid }),
      });
      const result = await response.json();
      if (result.success) {
        alert("Data berhasil dihapus!");
        fetchUser(); // Memuat ulang data
      } else {
        alert("Gagal menghapus data!");
      }
    } catch (error) {
      console.error("Error deleting user:", error);
    }
  };

  const handleEdit = (user) => {
    setForm({ nama: user.Nama, nim: user.NIM });
    // Bisa tambahkan ID ke dalam form state untuk memperbarui data
  };  
  
  const onSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      try {
        const response = await fetch("http://localhost:8080/database/backend/update.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(form),
        });
        const result = await response.json();
        if (result.success) {
          alert("Data berhasil diperbarui!");
          fetchUser(); // Memuat ulang data
          setForm({ nama: "", nim: "" }); // Reset form
        } else {
          alert("Gagal memperbarui data!");
        }
      } catch (error) {
        console.error("Error updating data:", error);
      }
    }
  };
  

  const validateForm = (form) => {
    const errors = {};
    if (!form.nama.trim()) {
      errors.nama = "nama is required"
    }
    if (!form.nim) {
      errors.nim = "nim is required"
    } else if (form.nim.length < 8) {
      errors.nim = "minimal nim 8 karakter"
    }
    return errors;
  }

  return (
    <>
      <form onSubmit={onSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">Nama</label>
            <input type="text" name="nama" id="nama" onChange={handleChange} />
            <span>{errors.nama}</span>
          </div>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">NIM</label>
            <input type="text" name="nim" id="nim" onChange={handleChange} />
            <span>{errors.nim}</span>
          </div>
        </div>
        <button type="submit" style={{marginTop: "16px"}}>Tambah</button>
      </form>

      <h2>Data User</h2>
      <table>
        <thead>
          <tr>
          <td>Nama</td>
          <td>NIM</td>
          </tr>
        </thead>
        <tbody>
          {console.log(users)}
          {users.map((user) => (
            <tr key={user.userid}>
            <td>{user.Nama}</td>
            <td>{user.NIM}</td>
            <td>
              <button onClick={() => handleEdit(user)}>Edit</button>
              <button onClick={() => handleDelete(user.userid)}>Delete</button>
            </td>
          </tr>
          ))}
        </tbody>
      </table>
    </>
  );

}

export default App;
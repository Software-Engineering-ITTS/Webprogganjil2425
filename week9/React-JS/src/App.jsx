import React, { useEffect } from "react";
import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";
import { rounded } from "react";

function App() {
  const [users, setUsers] = useState([]);
  const [form, setForm] = useState({ username: "", password: "" });
  const [errors, setError] = useState({});
  const [editUserId, setEditUserId] = useState(null);

  const handleChange = (e) => {
    // console.log(e.target.value);
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
    // const name = e.target.name
  };

  useEffect(() => {
    fetchUser();
  }, []);

  const fetchUser = async () => {
    try {
      const response = await fetch("http://localhost/week9/backend/read.php");
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch (eror) {
      console.log(eror);
    }
  };

  // const edit = async (id) => {
  //   e.preventDefault();
  //   // const errors = validateForm(form);
  //   // console.log(errors);
  //   setError(errors);
  //   if (Object.keys(errors).length === 0) {
  //     // console.log("gacor kang");
  //     const url = "http://localhost/week9/backend/edit.php";

  //     try {
  //       const response = await fetch(url, {
  //         method: "POST",
  //         headers: { "Content-Type": "application/json" },
  //         body: JSON.stringify(form),
  //       });
  //       fetchUser();
  //       setForm({ userid: null, nim: "", nama: "" });
  //     } catch (error) {
  //       console.log(error);
  //     }
  //   }
  // };

  const UpdateUser = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      const url = "http://localhost/backend/edit.php";

      try {
        const response = await fetch(url, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            ...form,
            userid: editUserId, // Pass the user id when updating
          }),
        });

        if (response.ok) {
          fetchUser();
          setForm({ nim: "", nama: "" });
          setEditUserId(null); // Reset the edit state
        } else {
          console.error("Error:", await response.text());
        }
      } catch (error) {
        console.error("eror:", error);
      }
    }
  };

  const editUser = (user) => {
    // Set the ID and populate the form state
    setEditUserId(user.userid);
    setForm({ nim: user.nim, nama: user.nama });
  };

  const hapusData = async (id) => {
    const url = "http://localhost/week9/backend/delete.php";

    try {
      const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id }),
      });
      const data = await response.json();
      fetchUser();
      // setForm({ userid:null , nim:"", nama: ""});
    } catch (error) {
      console.log(error);
    }
  };

  const OnSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    // console.log(errors);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      // console.log("gacor kang");
      const url = "http://localhost/week9/backend/simpan.php";

      try {
        const response = await fetch(url, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(form),
        });
        fetchUser();
        setForm({ userid: null, nim: "", nama: "" });
      } catch (error) {
        console.log(error);
      }
    }
    // console.log(form);
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.nim) {
      errors.username = "nim is required";
    }
    if (!form.nama.trim()) {
      errors.password = "nama is reuired";
      // } else if (form.password.length < 8) {
      //   errors.password = "minimal 8 bos";
    }
    return errors;
  };

  return (
    <>
      <form onSubmit={OnSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}
        >
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">nim</label>
            <input type="text" name="nim" id="nim" onChange={handleChange} />
            <span style={{ color: "red" }}>{errors.nim}</span>
          </div>
          <br />
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor=""> nama </label>
            <input type="nama" name="nama" id="nama" onChange={handleChange} />
            <span style={{ color: "red" }}>{errors.nama}</span>
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            tmbh
          </button>
        </div>
      </form>

      <h2> Data User</h2>
      <table border={1}>
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
                    hapusData(user.id);
                  }}
                >
                  Delete
                </button>
                <button
                  onClick={() => {
                    edit(user.id);
                  }}
                >
                  edit
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

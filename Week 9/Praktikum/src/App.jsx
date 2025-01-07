import { useEffect, useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";

function App() {
  // const [count, setCount] = useState(0);
  const [users, setUsers] = useState([]);
  const [form, setForm] = useState({ userid: "", nim: "", nama: "" });
  const [errors, setError] = useState({});

  const handleChange = (e) => {
    // console.log(e.target.name);
    const { name, value } = e.target;
    setForm({ ...form, [name]: value });
  };

  useEffect(() => {
    fetchUser();
  }, []);

  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/PraktikumWeb/backend/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
      console.log(data);
    } catch (error) {
      console.log(error);
    }
  };

  const OnSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      // console.log("call api post");
      const url = "http://localhost/PraktikumWeb/backend/simpandata.php";

      try {
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(form),
        });
        fetchUser();
        setForm({ id: null, nim: "", nama: "" });
      } catch (error) {
        console.log(error);
      }
    }
    // console.log(errors);
    // console.log(form);
  };

  const deleteData = async (userid) => {
    const url = "http://localhost/PraktikumWeb/backend/hapusdata.php";
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

  const editData = async (user) => {
    setForm({
      userid: user.userid,
      nim: user.nim,
      nama: user.nama,
    });
  };

  const validateForm = (form) => {
    const errors = {};

    if (!form.nim.trim()) {
      errors.nim = "nim is required";
    }
    if (!form.nama.trim()) {
      errors.nama = "nama is required";
    }
    // else if (form.nama.length < 8) {
    //   errors.nama = "minimal password 8 karakter";
    // }
    return errors;
  };

  return (
    // tidak boleh ada 2 tag yang sama, kecuali menggunakan ini pakai classname jangan class
    // <>
    // <div></div>
    // <div></div>
    // </>

    <>
      <form onSubmit={OnSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}
        >
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">Nim: </label>
            <input
              type="text"
              name="nim"
              id="nim"
              value={form.nim}
              onChange={handleChange}
            />
            <span>{errors.nim}</span>
          </div>
          <br />
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="">Nama: </label>
            <input
              type="text"
              name="nama"
              id="nama"
              value={form.nama}
              onChange={handleChange}
            />
            <span>{errors.nama}</span>
          </div>
          <button className="btn-submit" type="submit">
            Login
          </button>
        </div>
      </form>

      <h2>Data User</h2>
      <table>
        <thead>
          <tr>
            <td className="thead">Nim</td>
            <td className="thead">Nama</td>
            <td className="thead">Actions</td>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.userid}>
              <td>{user.nim}</td>
              <td>{user.nama}</td>
              <td>
                <button
                  className="btn-edit"
                  onClick={() => {
                    editData(user);
                  }}
                >
                  Edit
                </button>

                <button
                  className="btn-delete"
                  onClick={() => {
                    deleteData(user.userid);
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

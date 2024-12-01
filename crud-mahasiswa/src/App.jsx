import { useState, useEffect } from "react";

function App() {
  const [users, setUsers] = useState([]);
  const [form, setForm] = useState({ userid: null, nim: "", nama: "" });
  const [errors, setErrors] = useState({});
  const [isEdit, setIsEdit] = useState(false);

  const handledChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
  };

  useEffect(() => {
    fetchUser();
  }, []);

  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/projectphp/backend/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
    } catch (error) {
      console.log(error);
    }
  };

  const deleteData = async (userid) => {
    try {
      await fetch("http://localhost/projectphp/backend/delete.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ userid }),
      });
      fetchUser();
    } catch (error) {
      console.log(error);
    }
  };

  const editData = (user) => {
    setForm({ userid: user.userid, nim: user.nim, nama: user.nama }); // Isi form
    setIsEdit(true); // Aktifkan mode edit
  };

  const onsubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setErrors(errors);

    if (Object.keys(errors).length === 0) {
      const url = isEdit
        ? "http://localhost/projectphp/backend/edit.php"
        : "http://localhost/projectphp/backend/simpandata.php";

      try {
        await fetch(url, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(form),
        });
        fetchUser();
        setForm({ userid: null, nim: "", nama: "" });
        setIsEdit(false);
      } catch (error) {
        console.log(error);
      }
    }
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.nim) errors.nim = "NIM is required";
    if (!form.nama.trim()) errors.nama = "Nama is required";
    return errors;
  };

  return (
    <>
      <form onSubmit={onsubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="nim" style={{ color: "red" }}>
              NIM
            </label>
            <input
              type="text"
              name="nim"
              id="nim"
              value={form.nim}
              onChange={handledChange}
            />
            <span>{errors.nim}</span>
          </div>
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="nama">Nama</label>
            <input
              type="text"
              name="nama"
              id="nama"
              value={form.nama}
              onChange={handledChange}
            />
            <span>{errors.nama}</span>
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            {isEdit ? "Update" : "Save"}
          </button>
        </div>
      </form>

      <h2>Data User</h2>
      <table border={1}>
        <thead>
          <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.userid}>
              <td>{user.nim}</td>
              <td>{user.nama}</td>
              <td>
                <button onClick={() => deleteData(user.userid)}>Delete</button>
                <button onClick={() => editData(user)}>Edit</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </>
  );
}

export default App;

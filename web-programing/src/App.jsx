import { useState, useEffect } from "react";

function App() {
  const [users, setUsers] = useState([]); // Data pengguna dari database
  const [form, setForm] = useState({ userid: null, nama: "", nim: "" }); // Data form
  const [errors, setError] = useState({}); // Error validasi

  // Handle perubahan input
  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
  };

  // Fetch data pengguna dari database
  useEffect(() => {
    fetchUser();
  }, []);

  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/phpproject/database/lihatdata.php"
      );
      const data = await response.json();
      setUsers(data);
    } catch (error) {
      console.log(error);
    }
  };

  // Fungsi untuk menyimpan (tambah/edit) data
  const onSubmit = async (e) => {
    e.preventDefault();
    const errors = validateForm(form);
    setError(errors);

    if (Object.keys(errors).length === 0) {
      const url = form.userid
        ? "http://localhost/phpproject/database/editData.php" // Edit data
        : "http://localhost/phpproject/database/simpandata.php"; // Tambah data

      try {
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(form),
        });
        if (!response.ok) throw new Error("Failed to save data");

        // Perbarui data pengguna setelah berhasil tambah/edit
        fetchUser();
      } catch (error) {
        console.log(error);
      } finally {
        // Reset form setelah berhasil submit
        setForm({ userid: null, nim: "", nama: "" });
      }
    }
  };

  // Fungsi untuk menghapus data
  const deleteData = async (userid) => {
    const url = "http://localhost/phpproject/database/hapusdata.php";
    try {
      await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ userid }),
      });
      fetchUser();
    } catch (error) {
      console.log(error);
    }
  };

  // Fungsi untuk memuat data pengguna ke form (edit)
  const loadDataToForm = (user) => {
    setForm(user);
  };

  // Validasi form
  const validateForm = (form) => {
    const errors = {};
    if (!form.nim) {
      errors.nim = "NIM is required";
    }
    if (!form.nama.trim()) {
      errors.nama = "Nama is required";
    }
    return errors;
  };

  return (
    <>
      {/* Form untuk tambah/edit data */}
      <form onSubmit={onSubmit}>
        <div
          style={{ display: "flex", flexDirection: "column", width: "400px" }}
        >
          <div style={{ display: "flex", flexDirection: "column" }}>
            <label htmlFor="nim">NIM</label>
            <input
              type="text"
              name="nim"
              id="nim"
              value={form.nim}
              onChange={handleChange}
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
              onChange={handleChange}
            />
            <span>{errors.nama}</span>
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            {form.userid ? "Update" : "Submit"}
          </button>
        </div>
      </form>

      {/* Tabel data pengguna */}
      <h2>Data User</h2>
      <table border={1}>
        <thead>
          <tr>
            <td>NIM</td>
            <td>Nama</td>
            <td>Aksi</td>
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
                    deleteData(user.userid);
                  }}
                >
                  Delete
                </button>
                <button
                  onClick={() => {
                    loadDataToForm(user); // Memuat data ke form untuk di-edit
                  }}
                > 
                  Edit
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

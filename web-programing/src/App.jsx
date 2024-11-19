import { useState } from "react";
import "./styleMe.css";

function App() {
  const [users, setUsers] = useState([]); 
  const [form, setForm] = useState({ username: "", password: "" });
  const [errors, setErrors] = useState({}); 

  //ini dibuat untuk nyambungin ke database yaa | 
  const fetchUser = async () => {
    try {
      const response = await fetch(
        "http://localhost/phpproject/Database/viewData.php"
      ); // Ganti dengan URL API valid
      const data = await response.json(); 
      setUsers(data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching users:", error);
    }
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
  };

  const onSubmit = (e) => {
    e.preventDefault();
    const validationErrors = validateForm(form);
    setErrors(validationErrors);
    if (Object.keys(validationErrors).length === 0) {
      console.log("Call API POST with:", form);
    }
  };

  const validateForm = (form) => {
    const errors = {};
    if (!form.username.trim()) {
      errors.username = "Username is required";
    }
    if (!form.password) {
      errors.password = "Password is required";
    } else if (form.password.length < 8) {
      errors.password = "Minimal password 8 karakter";
    }
    return errors;
  };

  return (
    <div className="form-container">
      <form onSubmit={onSubmit}>
        <h2 style={{ marginBottom: "20px" }}>
          Tak Edit dikit ga ngaruh kan mas 😊
        </h2>
        <div className="form-content">
          <div className="form-group">
            <label htmlFor="username">Username : </label>
            <input
              type="text"
              name="username"
              id="username"
              onChange={handleChange}
            />
            {errors.username && (
              <span className="error-message">{errors.username}</span>
            )}
          </div>
          <div className="form-group">
            <label htmlFor="password">Password :</label>
            <input
              type="password"
              name="password"
              id="password"
              onChange={handleChange}
            />
            {errors.password && (
              <span className="error-message">{errors.password}</span>
            )}
          </div>
          <button type="submit" style={{ marginTop: "16px" }}>
            Login
          </button>
        </div>
      </form>
      {/* Table buat nampilin database */}
      <h2>Data User</h2>
      <table>
        <thead>
          <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.id}>
              <td>{user.id}</td> {/* Ganti `nim` dengan properti yang ada */}
              <td>{user.name}</td> {/* Ganti `nama` dengan properti yang ada */}
              <td>
                <button>Edit</button>
                <button>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;

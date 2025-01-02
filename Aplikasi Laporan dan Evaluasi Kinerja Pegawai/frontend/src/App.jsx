import React, { useState } from "react";
import { BrowserRouter as Router, Routes, Route, useNavigate } from "react-router-dom";
import "./App.css";
import { FaUser, FaLock } from "react-icons/fa";
import Register from "./Register";
import Dashboard from "./Dashboard";
import FormTambah from "./formtambah";
import FormPenilaian from "./formpenilaian";
import TabelLaporan from "./tabellaporan";

// Halaman Login
function Login() {
  const [showRegister, setShowRegister] = useState(false);
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  // Fungsi untuk menangani login
  const handleLogin = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch("http://localhost:5000/api/auth/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ username, password }),
      });

      const data = await response.json();
      if (response.ok) {
        // Login berhasil, pindah ke halaman dashboard
        navigate("/dashboard");
      } else {
        // Tampilkan pesan error jika login gagal
        alert(data.message);
      }
    } catch (error) {
      console.error("Login error:", error);
      alert("Terjadi kesalahan saat login. Silakan coba lagi.");
    }
  };

  return (
    <>
      {!showRegister ? (
        <div className="container">
          {/* Left Section */}
          <div className="left-section">
            <div className="signup">
              <span>Tidak Punya Akun?</span>
              <a href="#" onClick={() => setShowRegister(true)}>
                Sign Up
              </a>
            </div>
          </div>

          {/* Right Section */}
          <div className="right-section">
            <h2>Login Page</h2>
            <form onSubmit={handleLogin}>
              <label htmlFor="username">Username</label>
              <div className="input-group">
                <FaUser className="icon" />
                <input
                  type="text"
                  id="username"
                  placeholder="Enter Username"
                  value={username}
                  onChange={(e) => setUsername(e.target.value)}
                  required
                />
              </div>

              <label htmlFor="password">Password</label>
              <div className="input-group">
                <FaLock className="icon" />
                <input
                  type="password"
                  id="password"
                  placeholder="Enter Password"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  required
                />
              </div>

              <button type="submit" className="login-btn">
                Login
              </button>
            </form>
          </div>
        </div>
      ) : (
        <Register setShowRegister={setShowRegister} />
      )}
    </>
  );
}

// App Component
function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/dashboard" element={<Dashboard />} />
        <Route path="/formtambah" element={<FormTambah />} />
        <Route path="/formpenilaian" element={<FormPenilaian />} />
        <Route path="/tabellaporan" element={<TabelLaporan />} />
      </Routes>
    </Router>
  );
}

export default App;

import React, { useState } from "react";
import "./Register.css";
import { FaUser, FaEnvelope, FaLock } from "react-icons/fa";
import "./App.jsx";

function Register({ setShowRegister }) {
  // State untuk menyimpan input user
  const [email, setEmail] = useState("");
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");

  // Fungsi untuk menangani register
  const handleRegister = async (e) => {
    e.preventDefault();
    const userData = {
      email,
      username,
      password,
    };

    console.log('Username:', username);
    console.log('Password:', password);

    try {
      const response = await fetch("http://localhost:5000/api/auth/register", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(userData),
      });

      console.log('Response status:', response.status);
      const data = await response.json();
      console.log('Response data:', data);
      
      if (response.ok) {
        alert("Registration successful! Redirecting to login page...");
        setShowRegister(false);
      } else {
        const data = await response.json();
        alert(`Error: ${data.message}`);
      }
    } catch (error) {
      console.error("Error during registration:", error);
    }
  };

  return (
    <div className="register-container">
      {/* Right Section */}
      <div className="right-section">
        <h2>Register</h2>

        <form onSubmit={handleRegister}>
          <label htmlFor="username">Username</label>
          <div className="input-group">
            <FaUser className="icon" />
            <input
              type="text"
              id="username"
              placeholder="Enter Username"
              value={username}
              onChange={(e) => setUsername(e.target.value)} // Update state
              required
            />
          </div>

          <label htmlFor="email">Email</label>
          <div className="input-group">
            <FaEnvelope className="icon" />
            <input
              type="email"
              id="email"
              placeholder="Enter Email"
              value={email}
              onChange={(e) => setEmail(e.target.value)} // Update state
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
              onChange={(e) => setPassword(e.target.value)} // Update state
              required
            />
          </div>

          <button type="submit" className="register-btn">
            Register
          </button>
        </form>
      </div>
    </div>
  );
}

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
      </Routes>
    </Router>
  );
}

export default Register;

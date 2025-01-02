// src/components/RegisterPembelajar.jsx
import { useState } from "react";
import { Link } from "react-router-dom";  // Import Link untuk tombol kembali

function RegisterPembelajar() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const handleRegister = () => {
    // Proses registrasi
  };

  return (
    <div className="register-pembelajar">
      <h2>Registrasi Pembelajar</h2>
      <form onSubmit={handleRegister}>
        <div>
          <label>Email:</label>
          <input 
            type="email" 
            value={email} 
            onChange={(e) => setEmail(e.target.value)} 
            required
          />
        </div>
        <div>
          <label>Password:</label>
          <input 
            type="password" 
            value={password} 
            onChange={(e) => setPassword(e.target.value)} 
            required
          />
        </div>
        <button type="submit">Daftar</button>
      </form>
      <Link to="/login/pembelajar" className="back-btn">Kembali ke Login Pembelajar</Link>  {/* Tombol kembali */}
    </div>
  );
}

export default RegisterPembelajar;

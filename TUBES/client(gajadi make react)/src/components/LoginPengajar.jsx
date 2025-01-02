import React, { useState } from 'react';

const LoginPengajar = () => {
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    // Validasi password (misalnya, password harus 'admin' untuk pengajar)
    if (password === 'admin') {
      // Redirect atau logika setelah login berhasil
      alert('Login Berhasil');
    } else {
      setError('Password salah, coba lagi.');
    }
  };

  return (
    <div className="min-h-screen flex justify-center items-center bg-blue-100">
      <form onSubmit={handleSubmit} className="bg-white p-8 rounded shadow-md space-y-4 w-96">
        <h2 className="text-2xl font-bold text-blue-600">Login Pengajar</h2>
        {error && <p className="text-red-500">{error}</p>}
        <input
          type="password"
          placeholder="Password"
          className="w-full p-2 border border-gray-300 rounded-md"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />
        <button type="submit" className="w-full bg-blue-500 text-white p-2 rounded-md">Login</button>
      </form>
    </div>
  );
};

export default LoginPengajar;

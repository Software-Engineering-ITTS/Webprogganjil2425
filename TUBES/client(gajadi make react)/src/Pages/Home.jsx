import React from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
  return (
    <div className="min-h-screen bg-blue-100 flex items-center justify-center">
      <div className="text-center">
        <h1 className="text-3xl font-bold text-blue-800 mb-6">Selamat Datang</h1>
        <div className="space-x-4">
          <Link to="/login/pengajar" className="btn">Login sebagai Pengajar</Link>
          <Link to="/login/mahasiswa" className="btn">Login sebagai Mahasiswa</Link>
        </div>
      </div>
    </div>
  );
};

export default Home;

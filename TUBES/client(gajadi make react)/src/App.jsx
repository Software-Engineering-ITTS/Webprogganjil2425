
// import ListMatkul from './components/listMatkul';
// import AddMatkul from './components/addMatkul';
// import EditMatkul from './components/editMatkul';


import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Navbar from './components/Navbar';
import Home from './Pages/Home';
import LoginPengajar from './components/LoginPengajar';
import RegisterMahasiswa from './components/RegisterMahasiswa';
import LoginMahasiswa from './components/LoginPembelajar';

function App() {
  return (
    <Router>
      <Navbar />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/login/pengajar" element={<LoginPengajar />} />
        <Route path="/register/mahasiswa" element={<RegisterMahasiswa />} />
        <Route path="/login/mahasiswa" element={<LoginMahasiswa />} />
      </Routes>
    </Router>
  );
}

export default App;


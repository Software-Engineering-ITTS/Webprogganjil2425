import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import ListMatkul from './components/listMatkul';
import AddMatkul from './components/addMatkul';
import EditMatkul from './components/editMatkul';

const App = () => {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<ListMatkul />} />
        <Route path="/add" element={<AddMatkul />} />
        <Route path="/edit/:id" element={<EditMatkul />} />
      </Routes>
    </Router>   
  );
};

export default App;

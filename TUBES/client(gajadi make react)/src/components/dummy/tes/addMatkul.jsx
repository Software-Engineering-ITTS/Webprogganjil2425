import React, { useState } from 'react';
import api from '../../../services/api';

const AddMatkul = () => {
  const [name, setName] = useState('');
  const [description, setDescription] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await api.post('/addMK', { name, description });
      alert('Mata kuliah berhasil ditambahkan!');
    } catch (error) {
      console.error('Error nambah mata kuliah:', error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <h1>Tambah Mata Kuliah</h1>
      <input
        type="text"
        placeholder="Nama Mata Kuliah"
        value={name}
        onChange={(e) => setName(e.target.value)}
      />
      <textarea
        placeholder="Deskripsi Mata Kuliah"
        value={description}
        onChange={(e) => setDescription(e.target.value)}
      ></textarea>
      <button type="submit">Tambah</button>
    </form>
  );
};

export default AddMatkul;

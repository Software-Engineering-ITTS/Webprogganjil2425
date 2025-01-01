import React, { useState } from 'react';
import api from '../services/api';

const EditMatkul = ({ id }) => {
  const [name, setName] = useState('');
  const [description, setDescription] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await api.put('/editMK', { id, name, description });
      alert('Mata kuliah berhasil diperbarui!');
    } catch (error) {
      console.error('Error updating mata kuliah:', error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <h1>Edit Mata Kuliah</h1>
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
      <button type="submit">Simpan</button>
    </form>
  );
};

export default EditMatkul;

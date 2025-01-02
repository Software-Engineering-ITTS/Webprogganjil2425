import React, { useState, useEffect } from "react";
import axios from "axios";
import api from "../../../services/api";

const ListMatkul = () => {
  const [matkul, setMatkul] = useState([]); // State untuk menyimpan data mata kuliah
  const [error, setError] = useState(null); // State untuk menyimpan error

  useEffect(() => {
    // Fungsi untuk fetch data dari API
    const fetchMatkul = async () => {
      try {
        const response = await axios.get("http://localhost:5000/viewMK"); // Endpoint API
        setMatkul(response.data); // Simpan data ke state
      } catch (err) {
        setError(err.message); // Simpan error ke state 
        console.error("Error saat mengambil data:", err);
      }
    };

    fetchMatkul();
  }, []); // [] memastikan useEffect hanya dijalankan sekali

  if (error) {
    return <div>Error: {error}</div>; // Tampilkan pesan error jika ada
  }

  return (
    <div>
      <h1>Daftar Mata Kuliah</h1>
      <ul>
        {matkul.map((mk) => (
          <li key={mk.id}>
            {mk.name} - {mk.description}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default ListMatkul;

// models/courseModel.js
import db from "../konfig/db.js";

// Mata Kuliah Model
export const createMatkulTable = async () => {
  const query = `CREATE TABLE IF NOT EXISTS Matkul (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        idPengajar INT DEFAULT 1,
        status ENUM('active', 'nonactive') DEFAULT 'active',
        FOREIGN KEY (idPengajar) REFERENCES Pengajar(id) 
    )`;
  await db.query(query);
};

export const addMatkul = async (name, description) => {
  const query = `INSERT INTO Matkul (name, description, idPengajar) VALUES (?, ?, 1)`;
  await db.query(query, [name, description, 1]);
};

export const getAllMatkul = async () => {
  const query = `SELECT * FROM Matkul WHERE status = 'active'`;
  const [rows] = await db.query(query);
  return rows;
};

const checkMatkulExistence = async (id) => {
  const query = `SELECT * FROM Matkul WHERE id = ?`;
  const result = await db.query(query, [id]);
  return result.length > 0; // Return true jika data ada
};

export const updateMatkul = async (id, name, description) => {
//   const exists = await checkMatkulExistence(id);

//   if (!exists) {
//     throw new Error(`Matkul dengan id ${id} tidak ditemukan.`);
//   }
// sebelumnya kode di atas buat nge tes put di postman doang, {tanya mas dandy}


//   console.log(
//     `Menjalankan query: UPDATE Matkul SET name = ?, description = ? WHERE id = ${id}`
//   );

  const query = `UPDATE Matkul SET name = ?, description = ? WHERE id = ?`;
  await db.query(query, [name, description, id]);
};

export const statusMatkul = async (id) => {
  const query = `UPDATE Matkul SET status = 'nonactive' WHERE id = ?`;
  await db.query(query, [id]);
}; // sengaja saya gunakan status ini karena kata pak d, sebaiknya jika entitas tersebut krusial jangan di hapus permanen tapi di buat status

// Menghapus data secara permanen (hard delete)
export const deleteMatkul = async (id) => {
  const query = `DELETE FROM Matkul WHERE id = ?`;
  await db.query(query, [id]);
};

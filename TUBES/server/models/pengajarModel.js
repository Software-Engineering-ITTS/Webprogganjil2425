// models/userModel.js
import db from '../konfig/db.js';

// Pengajar Model
export const createPengajarTable = async () => {
    const query = `CREATE TABLE IF NOT EXISTS Pengajar (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL ,
        pass VARCHAR(255) NOT NULL
    )`;
    await db.query(query);
};

export const findPengajarByEmail = async (email) => {
    const query = `SELECT * FROM pengajar WHERE email = ?`;
    const [rows] = await db.query(query, [email]);
    return rows[0]; // Mengambil baris pertama (jika ada)
};

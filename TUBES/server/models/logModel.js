import db from '../konfig/db.js';

export const createLogTable = async () => {
    const query = `CREATE TABLE IF NOT EXISTS LogMatkul (
        id INT AUTO_INCREMENT PRIMARY KEY,
        idPembelajar INT NOT NULL,
        idMatkul INT NOT NULL,
        FOREIGN KEY (idPembelajar) REFERENCES pembelajar(id),
        FOREIGN KEY (idMatkul) REFERENCES matkul(id))`;
    await db.query(query);
};

export const addLogMatkul = async (idPembelajar, idMatkul) => {
    const query = `INSERT INTO logmatkul (idPembelajar, idMatkul)
        VALUES (?, ?);`;
    const [result] = await db.query(query, [idPembelajar, idMatkul]);
    return result;
};

export const findLogByPembelajar = async (idPembelajar) => {
    const query = `
        SELECT logmatkul.id, matkul.name AS matkul, matkul.description
        FROM logmatkul
        JOIN matkul ON logmatkul.idMatkul = matkul.id
        WHERE logmatkul.idPembelajar = ?;
    `;
    const [rows] = await db.query(query, [idPembelajar]); // Gunakan destructuring untuk mengambil rows
    return rows; // Kembalikan hanya data yang diperlukan
};


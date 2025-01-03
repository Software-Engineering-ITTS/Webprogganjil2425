import db from '../konfig/db.js';

// Pembelajar Model
export const createPembelajarTable = async () => {
    const query = `CREATE TABLE IF NOT EXISTS Pembelajar (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(50) NOT NULL ,
        pass VARCHAR(50) NOT NULL,
        prodi varchar(100) 
    )`;
    await db.query(query);
};

export const findPembelajarByEmail = async (email) => {
    const query = `SELECT * FROM pembelajar WHERE email = ?;`;
    const [result] = await db.query(query, [email]);
    return result[0]; //ngambil di index 0 bermaksud untuk mengambil 1 baris aja
};



export const insertPembelajar = async (name, email, pass, prodi) => {
    console.log("ini di model insert");  //ini debugging, konek ke frontend nya bermasalah mas
    const query = `
        INSERT INTO pembelajar (name, email, pass, prodi) 
        VALUES (?, ?, ?, ?);
    `;
    const result = await db.query(query, [name, email, pass, prodi]);
    return result;
};


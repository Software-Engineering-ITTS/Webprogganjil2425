const mysql = require('mysql2');

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root', // Sesuaikan dengan user MySQL Anda
  password: '', // Sesuaikan dengan password MySQL Anda
  database: 'penilaian dan evaluasi kinerja karyawan',
  port: 3306,
});

db.connect((err) => {
  if (err) {
    console.error('Database connection error:', err);
  } else {
    console.log('Connected to MySQL database');
  }
});

module.exports = db;

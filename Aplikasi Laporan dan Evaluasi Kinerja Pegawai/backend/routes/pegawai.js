const express = require('express');
const db = require('../config/db');
const router = express.Router();

// Route untuk menambahkan data pegawai
router.post('/tambah', (req, res) => {
    const { nama, no_telp, jabatan, alamat, departemen, waktu_penambahan_data } = req.body;

    if (!nama || !no_telp || !alamat || !jabatan || !departemen || !waktu_penambahan_data) {
        return res.status(400).json({ message: 'All fields are required' });
    }

    const query = `
        INSERT INTO tambah_pegawai (nama, no_telp, alamat, jabatan, departemen, waktu_penambahan_data)
        VALUES (?, ?, ?, ?, ?, ?)
    `;

    db.query(query, [nama, no_telp, alamat, jabatan, departemen, waktu_penambahan_data], (err, result) => {
        if (err) {
            console.error('Error inserting data:', err);
            return res.status(500).json({ message: 'Database error' });
        }
        res.status(201).json({ message: 'Pegawai added successfully' });
    });
});

module.exports = router;

// laporan.js
const express = require('express');
const db = require('../config/db');
const router = express.Router();

// Endpoint untuk mendapatkan data laporan
router.get('/laporan', async (req, res) => {
    try {
        const query = `
            SELECT tp.nama, tp.jabatan, tp.departemen, ekp.waktu_penilaian,
                   CASE ekp.puas_tidakpuas 
                       WHEN 1 THEN 'Puas' 
                       WHEN 0 THEN 'Tidak Puas' 
                   END AS kepuasan,
                   CASE ekp.dapat_bekerja_sesuai_SOP 
                       WHEN 1 THEN 'Ya' 
                       WHEN 0 THEN 'Tidak' 
                   END AS sesuai_SOP,
                   CASE ekp.melanggar_SOP 
                       WHEN 1 THEN 'Ya' 
                       WHEN 0 THEN 'Tidak' 
                   END AS melanggar_SOP,
                   ekp.keterangan
            FROM tambah_pegawai tp
            JOIN evaluasi_kinerja_pegawai ekp
            ON tp.ID_tambahpegawai = ekp.ID_tambahpegawai
        `;

        db.query(query, (err, results) => {
            if (err) {
                console.error('Error fetching laporan data:', err);
                res.status(500).json({ error: 'Internal Server Error' });
            } else {
                res.status(200).json(results);
            }
        });
    } catch (error) {
        console.error('Unexpected error:', error);
        res.status(500).json({ error: 'Internal Server Error' });
    }
});

module.exports = router;

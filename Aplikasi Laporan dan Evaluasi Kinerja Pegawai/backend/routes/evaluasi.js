const express = require('express');
const db = require('../config/db');
const router = express.Router();

// Route untuk mendapatkan nama pegawai
router.get('/nama-pegawai', async (req, res) => {
  try {
    const query = 'SELECT ID_tambahpegawai, nama FROM tambah_pegawai';
    db.query(query, (err, results) => {
      if (err) {
        return res.status(500).json({ message: 'Error fetching pegawai', error: err });
      }
      res.status(200).json(results);
    });
  } catch (error) {
    res.status(500).json({ message: 'Server error', error });
  }
});

// Route untuk menyimpan data evaluasi kinerja pegawai
router.post('/tambah-evaluasi', async (req, res) => {
  const { ID_tambahpegawai, waktu_penilaian, puas_tidakpuas, dapat_bekerja_sesuai_SOP, melanggar_SOP, keterangan } = req.body;

  if (!ID_tambahpegawai || !waktu_penilaian) {
    return res.status(400).json({ message: 'ID_tambahpegawai dan waktu_penilaian wajib diisi' });
  }

  try {
    const query = `
      INSERT INTO evaluasi_kinerja_pegawai (
        ID_tambahpegawai, waktu_penilaian, puas_tidakpuas, 
        dapat_bekerja_sesuai_SOP, melanggar_SOP, keterangan
      ) VALUES (?, ?, ?, ?, ?, ?)`;

    const values = [ID_tambahpegawai, waktu_penilaian, puas_tidakpuas, dapat_bekerja_sesuai_SOP, melanggar_SOP, keterangan];

    db.query(query, values, (err, results) => {
      if (err) {
        return res.status(500).json({ message: 'Error saving evaluation', error: err });
      }
      res.status(201).json({ message: 'Evaluasi berhasil disimpan', results });
    });
  } catch (error) {
    res.status(500).json({ message: 'Server error', error });
  }
});

module.exports = router;

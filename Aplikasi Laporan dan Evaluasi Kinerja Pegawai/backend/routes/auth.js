const express = require('express');
const db = require('../config/db');
const router = express.Router();
const bcrypt = require('bcryptjs');

// Register Route
router.post('/register', (req, res) => {
  const { email, username, password } = req.body;

  // Validasi input
  if (!email || !username || !password) {
    return res.status(400).json({ message: 'All fields are required' });
  }

  // Query untuk menambahkan user ke tabel login_admin
  const query = 'INSERT INTO login_admin (email, username, password) VALUES (?, ?, ?)';
  db.query(query, [email, username, password], (err, result) => {
    if (err) {
      console.error('Error inserting user:', err);
      return res.status(500).json({ message: 'Server error' });
    }
    res.status(201).json({ message: 'User registered successfully' });
  });
});

// Login Route
router.post('/login', (req, res) => {
  const { username, password } = req.body;

  // Validasi input
  if (!username || !password) {
    return res.status(400).json({ message: 'All fields are required' });
  }

  // Query untuk mencari user berdasarkan username
  const query = 'SELECT * FROM login_admin WHERE username = ?';
  db.query(query, [username], async (err, results) => {
    if (err) {
      console.error('Error fetching user:', err);
      return res.status(500).json({ message: 'Server error' });
    }

    if (results.length === 0) {
      return res.status(404).json({ message: 'User not found. Please sign up.' });
    }

    const user = results[0];
    const isPasswordValid = password === user.password;

    if (!isPasswordValid) {
      return res.status(401).json({ message: 'Invalid credentials' });
    }

    res.status(200).json({ message: 'Login successful' });
  });
});


module.exports = router;

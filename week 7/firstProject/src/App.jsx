import React, { useState } from 'react';
import './style.css';

function App() {
  // State variables to store form data
  const [email, setEmail] = useState('');
  const [fullName, setFullName] = useState('');
  const [password, setPassword] = useState('');
  const [phoneNumber, setPhoneNumber] = useState('');
  const [address, setAddress] = useState('');
  const [gender, setGender] = useState('');
  const [classSelected, setClassSelected] = useState('');
  const [formSubmitted, setFormSubmitted] = useState(false);

  // Function to handle form submission
  const handleSubmit = (e) => {
    e.preventDefault();
    setFormSubmitted(true);

    // Logging form data to the console
    console.log('Email:', email);
    console.log('Nama Lengkap:', fullName);
    console.log('Password:', password);
    console.log('Nomor Telepon:', phoneNumber);
    console.log('Alamat:', address);
    console.log('Gender:', gender);
    console.log('Kelas yang Dipilih:', classSelected);
  };

  return (
    <div className="container">
      <div className="card">
        <form onSubmit={handleSubmit}>
          <h2>Informasi Diri</h2>

          <label>Email:</label>
          <input
            type="email"
            value={email}
            placeholder='Masukkan Alamat Email'
            onChange={(e) => setEmail(e.target.value)}
          />

          <label>Nama Lengkap:</label>
          <input
            type="text"
            value={fullName}
            placeholder='Masukkan Nama Lengkap'
            onChange={(e) => setFullName(e.target.value)}
          />

          <label>Password:</label>
          <input
            type="password"
            placeholder='Masukkan Password'
            value={password}
            onChange={(e) => setPassword(e.target.value)}
          />

          <label>Nomor Telepon:</label>
          <input
            type="tel"
            value={phoneNumber}
            placeholder="+62 000-000-0900"
            onChange={(e) => setPhoneNumber(e.target.value)}
          />

          <label>Alamat:</label>
          <textarea
            value={address}
            placeholder='Masukkan Alamat Anda'
            onChange={(e) => setAddress(e.target.value)}
          ></textarea>

          <label>Pilih Gender:</label>
          <select value={gender} onChange={(e) => setGender(e.target.value)}>
            <option value="">Pilih Gender</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>

          <h2>Informasi Kelas</h2>
          <p>Nama Kelas Online:</p>
          <input
            type="radio"
            id="html"
            name="class"
            value="HTML"
            checked={classSelected === 'HTML'}
            onChange={(e) => setClassSelected(e.target.value)}
          />
          <label htmlFor="html">Class HTML</label><br />

          <input
            type="radio"
            id="css"
            name="class"
            value="CSS"
            checked={classSelected === 'CSS'}
            onChange={(e) => setClassSelected(e.target.value)}
          />
          <label htmlFor="css">Class CSS</label><br />

          <input
            type="radio"
            id="javascript"
            name="class"
            value="JavaScript"
            checked={classSelected === 'JavaScript'}
            onChange={(e) => setClassSelected(e.target.value)}
          />
          <label htmlFor="javascript">Class JavaScript</label><br />

          <label htmlFor="form-filled">Pernah Mengisi Form:</label>
          <input type="checkbox" id="form-filled" name="form_filled" />

          <button type="submit">Submit</button>
        </form>
      </div>

      {formSubmitted && (
        <div className="success-card">
          <p>Anda Berhasil Mengisi Form</p>
        </div>
      )}
    </div>
  );
}

export default App;

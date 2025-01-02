import React, { useState } from 'react';
import './Dashboard.css';
import './formtambah.css';
import { useNavigate } from 'react-router-dom';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';

const FormTambah = () => {
    const navigate = useNavigate();
    const [startDate, setStartDate] = useState(new Date());
    const [formData, setFormData] = useState({
        nama: '',
        no_telp: '',
        alamat: '',
        jabatan: '',
        departemen: '',
    });

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        if (name === 'no_telp') {
            // Validasi agar hanya angka yang diperbolehkan
            if (!/^\d*$/.test(value)) {
                alert('Nomor telepon hanya boleh berisi angka');
                return;
            }
        }
        setFormData({ ...formData, [name]: value });
    };

    const handleDateChange = (date) => {
        setStartDate(date);
    };

    const handleTambahPegawai = async (e) => {
        e.preventDefault();
        const dataToSend = {
            ...formData,
            waktu_penambahan_data: startDate.toISOString().split('T')[0], // Format YYYY-MM-DD
        };

        try {
            const response = await fetch('http://localhost:5000/api/pegawai/tambah', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(dataToSend),
            });

            if (response.ok) {
                alert('Pegawai berhasil ditambahkan!');
                navigate('/formtambah');
            } else {
                const errorData = await response.json();
                alert(`Gagal menambahkan pegawai: ${errorData.message}`);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menambahkan pegawai');
        }
    };

    return (
        <div className="dashboard-container">
            {/* Sidebar */}
            <div className="sidebar">
                <h2 className="sidebar-title">DASHBOARD</h2>
                <div className="T">
                    <button onClick={() => navigate('/formtambah')} className="sidebar-button">Tambah Pegawai</button>
                </div>
                <br />
                <div className="E">
                    <button onClick={() => navigate('/formpenilaian')} className="sidebar-button">Evaluasi Kinerja Pegawai</button>
                </div>
                <br />
                <div className="L">
                    <button onClick={() => navigate('/tabellaporan')} className="sidebar-button">Laporan Evaluasi</button>
                </div>
                <br />
                <br />
                <button onClick={() => navigate('/')} className="Kembali">Kembali</button>
            </div>

            {/* Sidebar 2 */}
            <div className='sidebar2'></div>

            {/* Main Content */}
            <div className="main-content">
                <h1 className="welcome-text">Form Tambah Pegawai</h1>
                <form className="form-tambah" onSubmit={handleTambahPegawai}>
                    <label>
                        <h3>Nama Pegawai:</h3>
                        <br />
                        <input
                            type="text"
                            name="nama"
                            value={formData.nama}
                            onChange={handleInputChange}
                            required
                        />
                    </label>
                    <br />
                    <label>
                        <h3>No. Telepon:</h3>
                        <br />
                        <input
                            type="text"
                            name="no_telp"
                            value={formData.no_telp}
                            onChange={handleInputChange}
                            required
                        />
                    </label>
                    <br />
                    <label>
                        <h3>Alamat:</h3>
                        <br />
                        <input
                            type="text"
                            name="alamat"
                            value={formData.alamat}
                            onChange={handleInputChange}
                            required
                        />
                    </label>
                    <br />
                    <label>
                        <h3>Jabatan:</h3>
                        <br />
                        <input
                            type="text"
                            name="jabatan"
                            value={formData.jabatan}
                            onChange={handleInputChange}
                            required
                        />
                    </label>
                    <br />
                    <label>
                        <h3>Departemen:</h3>
                        <br />
                        <input
                            type="text"
                            name="departemen"
                            value={formData.departemen}
                            onChange={handleInputChange}
                            required
                        />
                    </label>
                    <br />
                    <label>
                        <h3>Waktu Penambahan Data:</h3>
                        <br />
                        <DatePicker
                            selected={startDate}
                            onChange={handleDateChange}
                            className="waktu-penambahan-data"
                            dateFormat="yyyy-MM-dd"
                            required
                        />
                    </label>
                    <br />
                    <button type="submit" className="submit-button">Tambah</button>
                </form>
            </div>
        </div>
    );
};

export default FormTambah;

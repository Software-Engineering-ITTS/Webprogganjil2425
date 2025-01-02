import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';
import './Dashboard.css';
import './formpenilaian.css';

const FormPenilaian = () => {
    const navigate = useNavigate();
    const [namaPegawai, setNamaPegawai] = useState([]);
    const [formData, setFormData] = useState({
        ID_tambahpegawai: '',
        waktu_penilaian: new Date(),
        puas_tidakpuas: '',
        dapat_bekerja_sesuai_SOP: '',
        melanggar_SOP: '',
        keterangan: '',
    });

    useEffect(() => {
        const fetchNamaPegawai = async () => {
            try {
                const response = await fetch('http://localhost:5000/api/evaluasi/nama-pegawai');
                if (!response.ok) {
                    throw new Error('Gagal mengambil data nama pegawai.');
                }
                const data = await response.json();
                setNamaPegawai(data.map(pegawai => ({
                    ID_tambahpegawai: pegawai.ID_tambahpegawai,
                    nama: pegawai.nama,
                })));
            } catch (error) {
                console.error('Error fetching nama pegawai:', error);
            }
        };

        fetchNamaPegawai();
    }, []);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prevState => ({
            ...prevState,
            [name]: value,
        }));
    };

    const handleDateChange = (date) => {
        setFormData(prevState => ({
            ...prevState,
            waktu_penilaian: date,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await fetch('http://localhost:5000/api/evaluasi/tambah-evaluasi', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    ...formData,
                    waktu_penilaian: formData.waktu_penilaian.toISOString().split('T')[0], // Format YYYY-MM-DD
                }),
            });

            if (response.ok) {
                alert('Evaluasi berhasil disimpan!');
                navigate('/formpenilaian');
            } else {
                const errorData = await response.json();
                alert(`Gagal menyimpan evaluasi: ${errorData.message}`);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan evaluasi');
        }
    };

    const handleBack = () => {
        navigate('/');
    };

    return (
        <div className="dashboard-container">
            {/* Sidebar */}
            <div className="sidebar">
                <h2 className="sidebar-title">DASHBOARD</h2>
                <div className='T'>
                    <button onClick={() => navigate('/formtambah')} className="sidebar-button">Tambah Pegawai</button>
                </div>
                <br />
                <div className='E'>
                    <button onClick={() => navigate('/formpenilaian')} className="sidebar-button">Evaluasi Kinerja Pegawai</button>
                </div>
                <br />
                <div className='L'>
                    <button onClick={() => navigate('/tabellaporan')} className="sidebar-button">Laporan Evaluasi</button>
                </div>
                <br />
                <br />
                <button onClick={handleBack} className="Kembali">Kembali</button>
            </div>

            {/* Sidebar 2 */}
            <div className='sidebar2'>

            </div>

            {/* Main Content */}
            <div className="main-content">
                <h1 className="welcome-text">Form Evaluasi Kinerja Pegawai</h1>
                <form className="form-penilaian" onSubmit={handleSubmit}>
                    <label>
                        <h3>Nama Pegawai</h3>
                        <br />
                        <select
                            className='NamaDanID'
                            name="ID_tambahpegawai"
                            value={formData.ID_tambahpegawai}
                            onChange={handleInputChange}
                            required
                        >
                            <option value="">Hakim</option>
                            {namaPegawai.map((pegawai) => (
                                <option key={pegawai.ID_tambahpegawai} value={pegawai.ID_tambahpegawai}>
                                    {pegawai.nama}
                                </option>
                            ))}
                        </select>
                    </label>
                    <br />
                    <label>
                        <h3>Waktu Penilaian</h3>
                        <br />
                        <DatePicker
                            className='waktu-penilaian'
                            selected={formData.waktu_penilaian}
                            onChange={handleDateChange}
                            dateFormat="yyyy-MM-dd"
                            required
                        />
                    </label>
                    <br />
                    <label>
                        <h3>Apakah anda puas dengan kinerja pegawai tersebut?</h3>
                        <br />
                        <div className='radio-grup'>
                            <input
                                type="radio"
                                name="puas_tidakpuas"
                                value="1"
                                checked={formData.puas_tidakpuas === '1'}
                                onChange={handleInputChange}
                            /> Ya
                            <input
                                type="radio"
                                name="puas_tidakpuas"
                                value="0"
                                checked={formData.puas_tidakpuas === '0'}
                                onChange={handleInputChange}
                            /> Tidak
                        </div>
                    </label>
                    <br />
                    <label>
                        <h3>Apakah dapat bekerja sesuai dengan SOP?</h3>
                        <br />
                        <div className='radio-grup1'>
                            <input
                                type="radio"
                                name="dapat_bekerja_sesuai_SOP"
                                value="1"
                                checked={formData.dapat_bekerja_sesuai_SOP === '1'}
                                onChange={handleInputChange}
                            /> Ya
                            <input
                                type="radio"
                                name="dapat_bekerja_sesuai_SOP"
                                value="0"
                                checked={formData.dapat_bekerja_sesuai_SOP === '0'}
                                onChange={handleInputChange}
                            /> Tidak
                        </div>
                    </label>
                    <br />            
                    <label>
                        <h3>Apakah melanggar SOP?</h3>
                        <br />
                        <div className='radio-grup1'>
                            <input
                                type="radio"
                                name="melanggar_SOP"
                                value="1"
                                checked={formData.melanggar_SOP === '1'}
                                onChange={handleInputChange}
                            /> Ya
                            <input
                                type="radio"
                                name="melanggar_SOP"
                                value="0"
                                checked={formData.melanggar_SOP === '0'}
                                onChange={handleInputChange}
                            /> Tidak
                        </div>
                    </label>
                    <br />
                    <label>
                        <h3>Masukkan & Saran</h3>
                        <br />
                        <textarea
                            name="keterangan"
                            value={formData.keterangan}
                            onChange={handleInputChange}
                            required
                        />
                    </label>
                    <br />
                    <button type="submit" className="submit-button">Submit</button>
                </form>
            </div>
        </div>
    );
};

export default FormPenilaian;

// tabellaporan.jsx
import React, { useState, useEffect } from 'react';
import './Dashboard.css';
import './tabellaporan.css';
import { useNavigate } from 'react-router-dom';

const TabelLaporan = () => {
    const navigate = useNavigate();
    const [laporanData, setLaporanData] = useState([]);

    const fetchLaporan = async () => {
        try {
            const response = await fetch('http://localhost:5000/api/laporan/laporan');
            const data = await response.json();
            setLaporanData(data);
        } catch (error) {
            console.error('Error fetching laporan data:', error);
        }
    };

    useEffect(() => {
        fetchLaporan();
    }, []);

    const handleBack = () => {
        navigate('/'); // Kembali ke halaman utama
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
                <button onClick={handleBack} className="Kembali">Kembali</button>
            </div>

            {/* Sidebar 2 */}
            <div className='sidebar2'></div>

            {/* Main Content */}
            <div className='main-content'>
                <h1 className="welcome-text">Laporan Evaluasi Kinerja Karyawan</h1>
                <br />
                <div className="table-container">
                    <table className="evaluation-table">
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>JABATAN</th>
                                <th>DEPARTEMEN</th>
                                <th>WAKTU PENILAIAN</th>
                                <th>KEPUASAN TERHADAP PEGAWAI</th>
                                <th>DAPAT BEKERJA SESUAI SOP</th>
                                <th>MELANGGAR SOP</th>
                                <th>MASUKKAN & SARAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            {laporanData.map((row, index) => (
                                <tr key={index}>
                                    <td>{row.nama}</td>
                                    <td>{row.jabatan}</td>
                                    <td>{row.departemen}</td>
                                    <td>{row.waktu_penilaian}</td>
                                    <td>{row.kepuasan}</td>
                                    <td>{row.sesuai_SOP}</td>
                                    <td>{row.melanggar_SOP}</td>
                                    <td>{row.keterangan}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}

export default TabelLaporan;

import React from 'react';
import './Dashboard.css';
import { useNavigate } from 'react-router-dom';

const Dashboard = () => {
    const navigate = useNavigate();

    const handleBack = () => {
        navigate('/'); // Kembali ke halaman utama
    };

    const handleMoveformtambah = () => {
        navigate("/formtambah");
    }

    const handleMoveformpenilaian = () => {
        navigate("/formpenilaian");
    }

    return (
        <div className="dashboard-container">
            {/* Sidebar */}
            <div className="sidebar">
                <h2 className="sidebar-title">DASHBOARD</h2>
                <div className='T'>
                    <button onClick={handleMoveformtambah} className="sidebar-button">Tambah Pegawai</button>
                </div>
                <br />
                <div className='E'>
                    <button onClick={handleMoveformpenilaian} className="sidebar-button">Evaluasi Kinerja Pegawai</button>
                </div>
                <br />
                <div className='L'>
                    <button className="sidebar-button">Laporan Evaluasi</button>
                </div>
                <br />
                <br />
                <button onClick={handleBack} className='Kembali'>Kembali</button>
            </div>

            {/* Sidebar 2 */}
            <div className='sidebar2'>

            </div>

            {/* Main Content */}
            <div className="main-content">
                <h1 className="welcome-text">SELAMAT DATANG</h1>
                <p className="description-text">
                    Di halaman dashboard Penilaian dan Evaluasi Kinerja Pegawai
                </p>
            </div>
        </div>
    );
};

export default Dashboard;

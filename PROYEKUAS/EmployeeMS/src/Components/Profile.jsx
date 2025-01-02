import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { format } from 'date-fns';

const ViewPekerja = () => {
    const [pekerja, setPekerja] = useState([]);

    useEffect(() => {
        // Memanggil data pekerja dari endpoint backend
        axios.get('http://localhost:3000/auth/pekerja')
            .then(result => {
                if (result.data.Status) {
                    setPekerja(result.data.Result); // Menyimpan data pekerja ke state
                } else {
                    alert(result.data.Error);
                }
            })
            .catch(err => console.error('Error fetching pekerja data:', err));
    }, []);

    return (
        <div className="px-5 mt-3">
            <div className="d-flex justify-content-center">
                <h3>View Pekerja</h3>
            </div>

            <div className="mt-3">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Penghasilan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        {pekerja.map((p, index) => (
                            <tr key={index}>
                                <td>{p.nama}</td>
                                <td>{p.alamat}</td>
                                <td>Rp {p.penghasilan.toLocaleString()}</td>
                                <td>{p.tanggal_mulai ? format(new Date(p.tanggal_mulai), "yyyy-MM-dd") : "-"}</td>
                                <td>{p.tanggal_selesai ? format(new Date(p.tanggal_selesai), "yyyy-MM-dd") : "-"}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default ViewPekerja;

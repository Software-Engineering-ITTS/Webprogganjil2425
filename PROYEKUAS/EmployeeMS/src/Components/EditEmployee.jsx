import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';

const EditEmployee = () => {
    const { id } = useParams();
    const [employee, setEmployee] = useState({
        nama: "",
        tanggal_mulai: "",
        tanggal_selesai: "",
        penghasilan: "",
        category_id: "", 
        alamat: "",
    });
    const [category, setCategory] = useState([]);
    const navigate = useNavigate();

    useEffect(() => {
        // Fetch categories
        axios.get('http://localhost:3000/auth/category')
            .then(result => {
                if (result.data.Status) {
                    setCategory(result.data.Result);
                } else {
                    alert(result.data.Error);
                }
            }).catch(err => console.log(err));

        // Fetch employee data by ID
        
        axios.get(`http://localhost:3000/auth/employee/${id}`)
            .then(result => {
                if (result.data.Status) {
                    const emp = result.data.Result[0];
                    console.log(emp)
                    setEmployee({
                        
                        nama: emp.employee.nama,
                        tanggal_mulai: emp.employee.tanggal_mulai.slice(0,10),
                        tanggal_selesai: emp.employee.tanggal_selesai.slice(0,10),
                        penghasilan: emp.employee.penghasilan,
                        alamat: emp.employee.alamat,
                        category_id: emp.employee.category_id,
                    });
                } else {
                    alert(result.data.Error);
                }
            }).catch(err => console.log(err));
    }, [id]);

    const handleSubmit = (e) => {
        e.preventDefault();
        // console.log(id)
        axios.put(`http://localhost:3000/auth/edit_employee/${id}`, employee)

            .then(result => {
                if (result.data.Status) {
                    navigate('/dashboard/employee');
                } else {
                    alert(result.data.Error);
                }
            }).catch(err => console.log(err));
    };

    return (
        <div className="d-flex justify-content-center align-items-center mt-3">
            <div className="p-3 rounded w-50 border">
                <h3 className="text-center">Edit Pekerja</h3>
                <form className="row g-1" onSubmit={handleSubmit}>
                    <div className="col-12">
                        <label htmlFor="inputNama" className="form-label">
                            Nama
                        </label>
                        <input
                            type="text"
                            className="form-control rounded-0"
                            id="inputNama"
                            placeholder="Enter Nama"
                            value={employee.nama}
                            onChange={(e) => setEmployee({ ...employee, nama: e.target.value })}
                        />
                    </div>
                    <div className="col-12">
                        <label htmlFor="tanggalmulai" className="form-label">
                            Tanggal Mulai
                        </label>
                        <input
                            type="date"
                            className="form-control rounded-0"
                            id="tanggalmulai"
                            value={employee.tanggal_mulai}
                            onChange={(e) => setEmployee({ ...employee, tanggal_mulai: e.target.value })}
                        />
                    </div>
                    <div className="col-12">
                        <label htmlFor="inputtanggalselesai" className="form-label">
                            Tanggal Selesai
                        </label>
                        <input
                            type="date"
                            className="form-control rounded-0"
                            id="inputtanggalselesai"
                            value={employee.tanggal_selesai}
                            onChange={(e) => setEmployee({ ...employee, tanggal_selesai: e.target.value })}
                        />
                    </div>
                    <div className="col-12">
                        <label htmlFor="inputpenghasilan" className="form-label">
                            Penghasilan
                        </label>
                        <input
                            type="number"
                            className="form-control rounded-0"
                            id="inputpenghasilan"
                            placeholder="Enter Penghasilan"
                            value={employee.penghasilan}
                            onChange={(e) => setEmployee({ ...employee, penghasilan: e.target.value })}
                        />
                    </div>
                    <div className="col-12">
                        <label htmlFor="inputAlamat" className="form-label">
                            Alamat
                        </label>
                        <input
                            type="text"
                            className="form-control rounded-0"
                            id="inputAlamat"
                            placeholder="Masukan Alamat Proyek"
                            value={employee.alamat}
                            onChange={(e) => setEmployee({ ...employee, alamat: e.target.value })}
                        />
                    </div>
                    <div className="col-12">
                        <label htmlFor="category" className="form-label">
                            Kategori
                        </label>
                        <select
                            name="category"
                            id="category"
                            className="form-select"
                            value={employee.category_id}
                            onChange={(e) => setEmployee({ ...employee, category_id: e.target.value })}
                        >
                            <option value="">Pilih Kategori</option>
                            {category.map((c) => (
                                <option key={c.id} value={c.id}>
                                    {c.nama}
                                </option>
                            ))}
                        </select>
                    </div>
                    <div className="col-12">
                        <button type="submit" className="btn btn-primary w-100">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default EditEmployee;

import axios from "axios";
import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

const AddEmployee = () => {
  const [employee, setEmployee] = useState({
    nama: "",
    gambar: "",
    tanggal_mulai: "",
    tanggal_selesai: "",
    penghasilan: "",
    category_id: "", 
    alamat: "",
  });

  const [category, setCategory] = useState([]); // Menyimpan daftar kategori dari backend
  const navigate = useNavigate();

  useEffect(() => {
    axios
      .get("http://localhost:3000/auth/category") // Endpoint untuk mendapatkan kategori
      .then((result) => {
        if (result.data.Status) {
          setCategory(result.data.Result); // Menyimpan daftar kategori ke state
        } else {
          alert(result.data.Error);
        }
      })
      .catch((err) => console.error("Error fetching categories:", err));
  }, []);

  const handleSubmit = (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append("nama", employee.nama);
    formData.append("gambar", employee.gambar);
    formData.append("tanggal_mulai", employee.tanggal_mulai);
    formData.append("tanggal_selesai", employee.tanggal_selesai);
    formData.append("penghasilan", employee.penghasilan);
    formData.append("alamat", employee.alamat);
    formData.append("category_id", employee.category_id); // Pastikan category_id ditambahkan dengan benar

    axios
      .post("http://localhost:3000/auth/add_employee", formData) // Endpoint untuk menambahkan employee
      .then((result) => {
        if (result.data.Status) {
          navigate("/dashboard/employee"); // Redirect jika berhasil
        } else {
          alert(result.data.Error);
        }
      })
      .catch((err) => console.error("Error adding employee:", err));
  };

  return (
    <div className="d-flex justify-content-center align-items-center mt-3">
      <div className="p-3 rounded w-50 border">
        <h3 className="text-center">Tambah Pekerja</h3>
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
              onChange={(e) =>
                setEmployee({ ...employee, nama: e.target.value })
              }
            />
          </div>
          <div className="col-12 mb-3">
            <label className="form-label" htmlFor="inputGroupFile01">
              Select Gambar
            </label>
            <input
              type="file"
              className="form-control rounded-0"
              id="inputGroupFile01"
              name="gambar"
              onChange={(e) =>
                setEmployee({ ...employee, gambar: e.target.files[0] })
              }
            />
          </div>
          <div className="col-12">
            <label htmlFor="tanggalmulai" className="form-label">
              Tanggal Mulai
            </label>
            <input
              type="date" // Ganti ke type="date" untuk tanggal
              className="form-control rounded-0"
              id="tanggalmulai"
              onChange={(e) =>
                setEmployee({ ...employee, tanggal_mulai: e.target.value })
              }
            />
          </div>
          <div className="col-12">
            <label htmlFor="inputtanggalselesai" className="form-label">
              Tanggal Selesai
            </label>
            <input
              type="date" // Ganti ke type="date" untuk tanggal
              className="form-control rounded-0"
              id="inputtanggalselesai"
              onChange={(e) =>
                setEmployee({ ...employee, tanggal_selesai: e.target.value })
              }
            />
          </div>
          <div className="col-12">
            <label htmlFor="inputpenghasilan" className="form-label">
              Penghasilan
            </label>
            <input
              type="number" // Ganti ke type="number" untuk angka
              className="form-control rounded-0"
              id="inputpenghasilan"
              placeholder="Enter Penghasilan"
              onChange={(e) =>
                setEmployee({ ...employee, penghasilan: e.target.value })
              }
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
              onChange={(e) =>
                setEmployee({ ...employee, alamat: e.target.value })
              }
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
              onChange={(e) =>
                setEmployee({ ...employee, category_id: e.target.value }) 
              }
            >
              <option value="category">Pilih Kategori</option>
              {category.map((c) => (
                <option key={c.id} value={c.id}>
                  {c.nama}
                </option>
              ))}
            </select>
          </div>
          
          <div className="col-12">
            <button type="submit" className="btn btn-primary w-100">
              Tambah Pekerja
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default AddEmployee;

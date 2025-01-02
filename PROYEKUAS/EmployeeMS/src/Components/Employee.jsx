import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { format } from "date-fns";

const Employee = () => {
  const [employee, setEmployee] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    // Fetch employee data saat komponen pertama kali dimuat
    axios
      .get("http://localhost:3000/auth/employee")
      .then((result) => {
        if (result.data.Status) {
          setEmployee(result.data.Result);
        } else {
          alert(result.data.Error);
        }
      })
      .catch((err) => console.log(err));
  }, []);

  const handleDelete = (itemid) => {
    if (window.confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        // window.confirm("data masuk")
      axios
        .delete(`http://localhost:3000/auth/employee/${itemid}`)
        .then((result) => {
          if (result.data.Status) {
            // Update state untuk menghapus karyawan tanpa reload
            setEmployee((prev) => prev.filter((e) => e.employee.id !== itemid));
            console.log(employee)
            alert("Data berhasil dihapus");
          } else {
            alert("Gagal menghapus data: " + result.data.Error);
          }
        })
        .catch((err) => {
          console.error(err);
          alert("Terjadi kesalahan saat menghapus data");
        });
    }
  };

  return (
    <div className="px-5 mt-3">
      <div className="d-flex justify-content-center">
        <h3>List Pekerja</h3>
      </div>
      <Link to="/dashboard/add_employee" className="btn btn-success">
        Tambah Pekerja
      </Link>
      <div className="mt-3">
        <table className="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Penghasilan</th>
              <th>Alamat</th>
              <th>Nama Proyek</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {employee.map((e) => (
              <tr key={e.employee.id}>
                <td>{e.employee.nama}</td>
                <td>
                  <img
                    src={`http://localhost:3000/${e.employee.gambar}`}
                    className="employee_gambar"
                    alt="Employee"
                    style={{ width: "50px", height: "50px", objectFit: "cover" }}
                  />
                </td>
                <td>{format(new Date(e.employee.tanggal_mulai), "yyyy-MM-dd")}</td>
                <td>{format(new Date(e.employee.tanggal_selesai), "yyyy-MM-dd")}</td>
                <td>{e.employee.penghasilan}</td>
                <td>{e.employee.alamat}</td>
                <td>{e.category.nama}</td>
                <td>
                  <Link
                    to={`/dashboard/edit_employee/${e.employee.id}`}
                    className="btn btn-info btn-sm me-2"
                  >
                    Edit
                  </Link>
                  <button
                    className="btn btn-warning btn-sm"
                    onClick={() => handleDelete(e.employee.id)} // Gunakan ID yang benar
                  >
                    Delete
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
};

export default Employee;

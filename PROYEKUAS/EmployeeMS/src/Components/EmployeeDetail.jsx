import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { useNavigate, useParams } from 'react-router-dom'

const EmployeeDetail = () => {
  const [employee, setEmployee] = useState({}); // Default state diubah ke objek kosong
  const { id } = useParams();
  const navigate = useNavigate();

  useEffect(() => {
    // Fetch data karyawan berdasarkan id
    axios
      .get(`http://localhost:3000/employee/detail/${id}`)
      .then((result) => {
        if (result.data.length > 0) {
          setEmployee(result.data[0]);
        } else {
          alert("Employee not found");
        }
      })
      .catch((err) => console.log(err));
  }, [id]); // Tambahkan `id` ke array dependensi

  const handleLogout = () => {
    axios
      .get('http://localhost:3000/employee/logout')
      .then((result) => {
        if (result.data.Status) {
          localStorage.removeItem("valid");
          navigate('/');
        }
      })
      .catch((err) => console.log(err));
  };

  return (
    <div>
      <div className="p-2 d-flex justify-content-center shadow">
        <h4>Employee Management System</h4>
      </div>
      <div className="d-flex justify-content-center flex-column align-items-center mt-3">
        <img
          src={`http://localhost:3000/Images/${employee.image || 'default.png'}`} // Fallback jika `employee.image` kosong
          className="emp_det_image"
          alt={employee.name || 'Employee'}
        />
        <div className="d-flex align-items-center flex-column mt-5">
          <h3>Name: {employee.name || 'N/A'}</h3>
          <h3>Email: {employee.email || 'N/A'}</h3>
          <h3>Salary: ${employee.salary || '0.00'}</h3>
        </div>
        <div>
          <button
            className="btn btn-primary me-2"
            onClick={() => navigate(`/dashboard/edit_employee/${id}`)}
          >
            Edit
          </button>
          <button className="btn btn-danger" onClick={handleLogout}>
            Logout
          </button>
        </div>
      </div>
    </div>
  );
};

export default EmployeeDetail;

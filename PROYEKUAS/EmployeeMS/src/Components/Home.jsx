import axios from 'axios';
import React, { useEffect, useState } from 'react';


const Home = () => {
  const [adminTotal, setAdminTotal] = useState(0); // Total admin
  const [employeeTotal, setEmployeeTotal] = useState(0); // Total pekerja
  const [totalPenghasilan, setTotalPenghasilan] = useState(0); // Total penghasilan pekerja
  
  useEffect(() => {
    AdminCount();
    EmployeeCount();
    PenghasilanTotal();
  }, []);

  // Mengambil jumlah admin
  const AdminCount = () => {
    axios
      .get('http://localhost:3000/auth/admin_count')
      .then((result) => {
        if (result.data.Status) {
          setAdminTotal(result.data.Result[0].admin); // Menyimpan jumlah admin
        }
      })
      .catch((err) => console.error('Error fetching admin count:', err));
  };

  // Mengambil jumlah pekerja
  const EmployeeCount = () => {
    axios
      .get('http://localhost:3000/auth/employee_count')
      .then((result) => {
        if (result.data.Status) {
          setEmployeeTotal(result.data.Result[0].employee); // Menyimpan jumlah pekerja
        }
      })
      .catch((err) => console.error('Error fetching employee count:', err));
  };

  // Mengambil total penghasilan pekerja
  // Mengambil total penghasilan pekerja
const PenghasilanTotal = () => {
  axios
    .get('http://localhost:3000/auth/penghasilan_total') // Pastikan endpoint sesuai
    .then((result) => {
      if (result.data.Status) {
        setTotalPenghasilan(result.data.Result[0].penghasilanOFEmp); // Pastikan sesuai dengan nama properti dari backend
      } else {
        alert(result.data.Error)
      }
    })
};


  return (
    <div>
      <div className="p-3 d-flex justify-content-around mt-3">
        {/* Kartu untuk Total Admin */}
        <div className="px-3 pt-2 pb-3 border shadow-sm w-25">
          <div className="text-center pb-1">
            <h4>Admin</h4>
          </div>
          <hr />
          <div className="d-flex justify-content-between">
            <h5>Total:</h5>
            <h5>{adminTotal}</h5>
          </div>
        </div>
        {/* Kartu untuk Total Employee */}
        <div className="px-3 pt-2 pb-3 border shadow-sm w-25">
          <div className="text-center pb-1">
            <h4>Employee</h4>
          </div>
          <hr />
          <div className="d-flex justify-content-between">
            <h5>Total:</h5>
            <h5>{employeeTotal}</h5>
          </div>
        </div>
        {/* Kartu untuk Total Penghasilan */}
        <div className="px-3 pt-2 pb-3 border shadow-sm w-25">
          <div className="text-center pb-1">
            <h4>Penghasilan</h4>
          </div>
          <hr />
          <div className="d-flex justify-content-between">
            <h5>Total:</h5>
            <h5>Rp {totalPenghasilan}</h5>
          </div>
        </div>
      </div>
      
    </div>
  );
};

export default Home;

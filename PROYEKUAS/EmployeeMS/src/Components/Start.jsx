import React, { useEffect } from "react";
import { useNavigate } from "react-router-dom";

const Start = () => {
  const navigate = useNavigate();

  // Langsung mengarahkan ke halaman login admin
  useEffect(() => {
    // Auto redirect tidak diperlukan lagi jika ada tombol
  }, [navigate]);

  return (
    <div className="d-flex justify-content-center align-items-center vh-100 loginPage">
      <div className="p-3 rounded w-25 border loginForm">
        <h2 className="text-center">Welcome</h2>
        <div className="d-flex justify-content-between mt-5 mb-2">
          {/* Tombol untuk login sebagai Admin */}
          <button 
            type="button" 
            className="btn btn-success w-100" 
            onClick={() => navigate('/adminlogin')}
          >
            Login as Admin
          </button>
        </div>
      </div>
    </div>
  );
};

export default Start;

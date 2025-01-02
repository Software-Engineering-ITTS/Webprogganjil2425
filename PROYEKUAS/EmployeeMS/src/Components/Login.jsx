import React, { useState } from 'react';
import './style.css';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const Login = () => {
    const [values, setValues] = useState({
        email: '',
        password: '',
    });
    const [error, setError] = useState(null);
    const navigate = useNavigate();

    axios.defaults.withCredentials = true;

    const handleSubmit = (event) => {
        event.preventDefault();

        // Mengirim data login ke server
        axios
            .post('http://localhost:3000/auth/adminlogin', values)
            .then((result) => {
                if (result.data.loginStatus) {
                    // Simpan status login di localStorage
                    localStorage.setItem('valid', true);

                    // Redirect ke dashboard
                    navigate('/dashboard');
                } else {
                    setError(result.data.Error);
                }
            })
            .catch((err) => {
                console.error(err);
                setError('ada kealahan dalam menginput silahkan isi kembali yang sesuai.');
            });
    };

    return (
        <div className="d-flex justify-content-center align-items-center vh-100 loginPage">
            <div className="p-3 rounded w-25 border loginForm">
                {/* Tampilkan error jika ada */}
                {error && <div className="text-warning">{error}</div>}
                <h2>Login Page</h2>
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label htmlFor="email">
                            <strong>Email:</strong>
                        </label>
                        <input
                            type="email"
                            name="email"
                            autoComplete="off"
                            placeholder="Enter Email"
                            onChange={(e) => setValues({ ...values, email: e.target.value })}
                            className="form-control rounded-0"
                        />
                    </div>
                    <div className="mb-3">
                        <label htmlFor="password">
                            <strong>Password:</strong>
                        </label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Enter Password"
                            onChange={(e) => setValues({ ...values, password: e.target.value })}
                            className="form-control rounded-0"
                        />
                    </div>
                    <button className="btn btn-success w-100 rounded-0 mb-2">Log in</button>
                    <div className="mb-1">
                        <input type="checkbox" name="tick" id="tick" className="me-2" />
                        <label htmlFor="password">Terima dan centang </label>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default Login;

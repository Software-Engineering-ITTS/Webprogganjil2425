import { useState } from 'react'
import './Login.css';
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
//import './App.css'


// kode Js

function Login() {
    const [Username, setUsername] = useState('');
    const [Password, setPassword] = useState('');

    const manualLogin = () => {
        for (let i = 0; i < Username.length; i++) {
            const char = Username[i];
            if (!(char >= 'A' && char <= 'Z') && !(char >= 'a' && char <= 'z')) {
                alert("Username Tidak Boleh Mengandung Angka");
                return;
            }
        }
        if (Password.length < 10) {
            alert("Password Harus Minimal 10 Kata");
            return;
        }
        alert("Login Berhasil");
        window.location.href = "Pelayanan.html"
    };


    // kode html
    return (
        <div className="img-f">
            <div className="form">

                <h1 className="h1">Welcome To Website PekkaMed</h1>
                <h3 className="h3">Silahkan Login Terlebih Dahulu Yachh</h3>
                <div>
                    <div className="form-login">
                        <label htmlfor="Username">Username</label> <br />
                        <input
                            type="text"
                            className="kolom"
                            id="Username"
                            name="Username"
                            value={Username}
                            onChange={(e) => setUsername(e.target.value)}
                            required />
                        <br />
                        <br />
                    </div>
                    <div class="form-login">
                        <label for="Password">Password</label> <br />
                        <input
                            type="Password"
                            className="kolom"
                            id="Password"
                            name="Password"
                            value={Password}
                            onChange={(e) => setPassword(e.target.value)}
                            required />
                    </div>
                    <div className="form-login-ok">
                        <button type="button" class="click" onclick={manualLogin}>Login</button>

                    </div>
                </div>
                <br />
            </div>
        </div>

    );
}
export default Login;
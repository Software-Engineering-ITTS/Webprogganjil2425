
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'

import { useEffect, useState } from "react"

function App() {
    const [users, setUsers] = useState([]);
    const [form, setForm] = useState({ username: "", password: "" });
    const [errors, setError] = useState({})

    const handleChange = (e) => {
        const { name, value } = e.target
        setForm({
            ...form,
            [name]: value
        });
    }

    useEffect(() => {
        fetchUser()
    }, []);

    const fetchUser = async () => {
        try {
            const response = await fetch("http://localhost:8080/Webprogganjil2425/phphelloworld/backend/lihatdata.php");
            const data = await response.json();
            setUsers(data);
            console.log(data);
        } catch (error) {
            console.log(error);
        }
    }

    const OnSubmit = (e) => {
        e.preventDefault();
        const errors = validateForm(form);
        setError(errors)

        if (Object.keys(errors).length === 0) {
            console.log("Call API POST")
        }
    }

    const validateForm = (form) => {
        const errors = {};

        if (!form.username.trim()) {
            errors.username = "required"
        }
        if (!form.password) {
            errors.password = "required"
        } else if (form.password.length < 8) {
            errors.password = "minimal password 8 karakter"
        }

        return errors
    }
    return (
        <>
            <form onSubmit={OnSubmit}>
                <div style={{ display: "flex", flexDirection: "column", width: "400px" }}>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="" >Username</label>
                        <input type="text" name="username" id="username" onChange={handleChange} />
                        <span style={{ color: "red" }}>{errors.username}</span>
                    </div>
                    <br />
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor=""> Password </label>
                        <input type="password" name="password" id="password" onChange={handleChange} />
                        <span style={{ color: "red" }}>{errors.password}</span>
                    </div>
                    <button type="submit" style={{ marginTop: "16px" }}>Login</button>
                </div>
            </form>

            <h2> Data User</h2>
            <table>
                <thead>
                    <tr>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Actions</td>
                    </tr>
                    
                </thead>
                <tbody>
                    {users.map((user) => (
                        <tr key={user.id}>
                            <td>{user.nim}</td>
                            <td>{user.nama}</td>
                            <td>
                                
                                <button>Delete</button>
                            </td>
                        </tr>

                    ))}

                </tbody>
            </table>

        </>
    )


}

export default App
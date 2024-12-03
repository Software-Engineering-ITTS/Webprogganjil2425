import { useEffect, useState } from "react";
// import reactLogo from "./assets/react.svg";
// import viteLogo from "/vite.svg";
// import "./App.css";

function App() {
    const [form, setForm] = useState({ username: "", password: "" });
    const [errors, setError] = useState({});
    const [users, setUsers] = useState([]);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setForm({
            ...form,
            [name]: value
        });
    }

    useEffect(() => {
        fetchUser()
    }, [])

    const fetchUser = async () => {
        // console.log("test")
        try {
            const response = await fetch("http://localhost/diPHP/backend/lihatdata.php");
            // console.log(response);
            const data = await response.json();
            setUsers(data);
            console.log(data);
        } catch (error) {
            console.log(error)
        }
    };

    const onSubmit = (e) => {
        e.preventDefault();
        const errors = validateForm(form);
        // console.log(errors)
        setError(errors);
        if (Object.keys(errors).length === 0) {
            console.log("call api post")
        }
        // console.log(form);
    }

    const validateForm = (form) => {
        const errors = {};
        if (!form.username.trim()) {
            errors.username = "username is required"
        }
        if (!form.password) {
            errors.password = "password is required"
        } else if (form.password.length < 8) {
            errors.password = "minimal password 8 karakter"
        }
        return errors;
    }

    return (
        <>
            <form onSubmit={onSubmit}>
                <div
                    style={{ display: "flex", flexDirection: "column", width: "400px" }}>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="">Username</label>
                        <input type="text" name="username" id="username" onChange={handleChange} />
                        <span>{errors.username}</span>
                    </div>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="">Password</label>
                        <input type="text" name="password" id="password" onChange={handleChange} />
                        <span>{errors.password}</span>
                    </div>
                </div>
                <button type="submit" style={{ marginTop: "16px" }}>Login</button>
            </form>

            <h2>Data User</h2>
            <table>
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>NIM</td>
                    </tr>
                </thead>
                <tbody>
                    {console.log(users)}
                    {users.map((user) => (
                        <tr key={user.userid}>
                            <td>{user.Nama}</td>
                            <td>{user.NIM}</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );

}

export default App;
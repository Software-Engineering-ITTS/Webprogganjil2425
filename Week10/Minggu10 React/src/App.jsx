import { useState, useEffect } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
// import './App.css'

function App() {
    const [users, setUsers] = useState([])
    const [form, setForm] = useState({ userid: "", nim: "", nama: "" })
    const [errors, setError] = useState({});
    const handledChange = (e) => {
        const { name, value } = e.target
        setForm({
            ...form,[name]: value
        });
    }
    const handleReset = () => {
        setForm({
            userid: "",
            nim: "",
            nama: ""
        });
        setError({});
    };

    useEffect(() => {
        fetchUser();
    }, [])

    const fetchUser = async () => {
        try {
            const response = await fetch("http://localhost/week10/phpreact/lihatdata.php");
            const data = await response.json();
            console.log("Data terfetch: ", data)
            setUsers(data);
        } catch(errors) {
            console.log(errors)
        }
    } 
    const onsubmit = async (e) => {
        e.preventDefault()
        const errors = validateForm(form)
        // console.log(errors)
        setError(errors);
        if (Object.keys(errors).length === 0) {
            // console.log("call api post")
            const url = form.userid
                ? "http://localhost/week10/phpreact/editdata.php"
                : "http://localhost/week10/phpreact/simpandata.php";

            try {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type":"application/json",
                    },
                    body: JSON.stringify(form)
                })
                fetchUser();
                setForm({ userid: "", nim: "", nama: "" })
            } catch(errors) {
                console.log(errors)
            }
        }
        //console.log(form)
    }

    const validateForm = (form) => {
        const errors = {};
        if (!form.nim.trim()) {
            errors.nim = "Nim is required"
        }
        if (!form.nama) {
            errors.nama = "Nama is required"
        }
        // else if (form.password.length < 8) {
        //     errors.password = "minimal password 8 karakter"
        // }
        return errors;
    }

    const editUser = (user) => {
        console.log(user);
        setForm({ userid: user.userid, nim: user.nim, nama: user.nama });
    };

    const deleteUser = async (userid) => {
        try {
            const response = await fetch("http://localhost/week10/phpreact/hapusdata.php", {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ userid }),
            });
    
            const result = await response.json();
            console.log(result.message);
            fetchUser();
        } catch (error) {
            console.error("Error deleting user:", error);
        }
    };
    
    return (
        <>
            <form onSubmit={onsubmit}>
                <div style={{ display: "flex", flexDirection: "column", width: "400px" }}>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="nim" style={{ color: "red" }}>Nim</label>
                        <input type="text" name="nim" id="nim" value={form.nim} onChange={handledChange}></input>
                        <span>{errors.nim}</span>
                    </div>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value={form.nama} onChange={handledChange}></input>
                        <span>{errors.nama}</span>
                    </div>
                    <button type="button" style={{ marginTop: "16px" }} onClick={handleReset}>Reset</button>
                    <button type="submit" style={{ marginTop: "16px" }}>Submit</button>
                </div>
            </form>

            <h2>Data User</h2>
            <table border={1}>
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>        
                </thead>
                <tbody>
                    {users.map((user) => (
                        <tr key={user.userid}>
                            <td>{user.nim}</td>
                            <td>{user.nama}</td>
                            <td> 
                                <button onClick={() => editUser(user)}>Edit</button>
                                <button onClick={() => deleteUser(user.userid)}>Delete</button>
                            </td>
                        </tr>
                    ))}
                </tbody>        
            </table>
        </>
    )
}
export default App
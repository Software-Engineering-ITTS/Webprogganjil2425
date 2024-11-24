
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'

import { useEffect, useState } from "react"

function App() {
    const [users, setUsers] = useState([]);
    const [form, setForm] = useState({ nim: "", nama: "" });
    const [errors, setError] = useState({})

    const handleChange = (e) => {
        const { name, value } = e.target
        setForm({
            ...form,
            [name]: value
        });
    }

    const deleteData = async (userid) => {
         // console.log("Call API POST")
         const url = "http://localhost:8080/Webprogganjil2425/phphelloworld/backend/hapusdata.php";
         try {
             const response = await fetch(url,
                 {
                     method: "POST",
                     headers: {
                         "Content-Type": "application/json",
                     },
                     body: JSON.stringify({userid})
                 }
             );
             fetchUser();
             
         } catch (error) {
             console.log(error);
         }
    }

    const selectUser = async (userid) => {
        // console.log("Call API Select User " + userid)
        const url = "http://localhost:8080/Webprogganjil2425/phphelloworld/backend/getuser.php";
        try {
            const response = await fetch(url,
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({userid})
                }
            );
            // console.log("response");
            // console.log(response);
            const data = await response.json();
            // console.log("data");
            // console.log(data);
            // fetchUser();
            setForm({id: userid, nim:data['nim'], nama:data['nama']});
            
        } catch (error) {
            console.log(error);
        }
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

    const OnSubmit = async (e) => {
        e.preventDefault();
        const errors = validateForm(form);
        setError(errors)

        if (Object.keys(errors).length === 0) {

            try {
                
                const url = "http://localhost:8080/Webprogganjil2425/phphelloworld/backend/simpandata.php";
                const response = await fetch(url,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(form)
                    }
                );
                // setUsers(null)

                fetchUser();
                setForm({id: "null", nim:"", nama:""});
                e.target.reset();
            } catch (error) {
                console.log(error);
            }
        }
    }

    const validateForm = (form) => {
        const errors = {};

        if (!form.nim.trim()) {
            errors.nim = "required"
        }
        if (!form.nama) {
            errors.nama = "required"
        }

        return errors
    }
    return (
        <>
            <form onSubmit={OnSubmit}>
                <div style={{ display: "flex", flexDirection: "column", width: "400px" }}>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="" >nim</label>
                        <input type="text" name="nim" id="nim" onChange={handleChange} value={form.nim}/>
                        <span style={{ color: "red" }}>{errors.nim}</span>
                    </div>
                    <br />
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor=""> nama </label>
                        <input type="text" name="nama" id="nama" onChange={handleChange} value={form.nama}/>
                        <span style={{ color: "red" }}>{errors.nama}</span>
                    </div>
                    <button type="submit" style={{ marginTop: "16px" }}>Simpan</button>
                    <button type="clear" style={{ marginTop: "16px" }}>Clear</button>
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
                        <tr key={user.userid}>
                            <td>{user.nim}</td>
                            <td>{user.nama}</td>
                            <td>

                                <button onClick={() => deleteData(user.userid)}>Delete</button>
                                <button onClick={() => selectUser(user.userid)}>Edit</button>
                            </td>
                        </tr>

                    ))}

                </tbody>
            </table>

        </>
    )


}

export default App